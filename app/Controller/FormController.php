<?php

class FormController extends AppController {

    var $components = array('Captcha.Captcha'=>array('Model'=>'Signup', 
                        'field'=>'security_code'), 'Wizard.Wizard');//'Captcha.Captcha'

    var $uses = array('Signup', 'Registereduser','Post','Applicant','Education','Experience','Image', 'Misc', 'Researchpaper', 
                      'Researcharticle', 'Researchproject', 'Document', 'ApiScore', 'Experiencephd');                
    
    public $helpers = array('Captcha.Captcha');
    
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
    }
	


    function captcha()  {
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha.Captcha'); //load it
        }
        $this->Captcha->create();
    }
    
    public function generalinformation() {
           $applicants = $this->Applicant->find('all', array(
                'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
           $posts_applied = $this->Post->find('all', array(
                        'conditions' => array('Post.reg_id' => $this->Session->read('registration_id'))));
            if (count($applicants) == 1 ) {
                $this->set('applicant', $applicants['0']);
                $this->set('final_subimt', $applicants['0']['Applicant']['final_submit']);
            }
            $this->set('postsapplied', $posts_applied);
            $this->Wizard->resetWizard();
    }
        
        public function register() {
            if(!empty($this->data['Registereduser'])) {
                $this->Signup->setCaptcha('security_code', $this->Captcha->getCode('Signup.security_code')); //getting from component and passing to model to make proper validation check
                $this->Signup->set($this->request->data);
                if ($this->Signup->validates()) {
                    $segments = explode('/', $this->data['Registereduser']['dob']);
                    if (count($segments) !== 3 || !preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/", $this->data['Registereduser']['dob'])) {
                        $this->Session->setFlash('Date of Birth is not in correct format.');
                        return false;
                    }
                    list($dd,$mm,$yyyy) = $segments;
                    if (!checkdate((int)$mm,(int)$dd,(int)$yyyy)) {
                        $this->Session->setFlash('Date of Birth is not in correct format.');
                        return false;
                    }
                    if(!filter_var($this->data['Registereduser']['email'], FILTER_VALIDATE_EMAIL)) {
                        $this->Session->setFlash('Email Id is not in correct format.');
                        return false;
                    }
                    if (!preg_match("/^[789]\d{9}$/",$this->data['Registereduser']['mobile_no'])) {
                        $this->Session->setFlash('Mobile number is not correct. Please enter a valid 10 digit mobile number.');
                        return false; 
                    }
                    $registered_user = $this->Registereduser->find('all', array(
                                'conditions' => array('Registereduser.email' => trim($this->data['Registereduser']['email']),
                                                      'Registereduser.dob' => trim($this->data['Registereduser']['dob']))
                                                    ));
                    if(count($registered_user) != 0) {
                        $this->Session->setFlash('Email / Date of Birth is already registered.');
                        return false;
                    }
                    $this->Applicant->create();
                    $this->Applicant->set(array(
                        'advertisement_no' => 'T-01 (2016)',
                        'category' => $this->data['Registereduser']['category']));
                    
                    if($this->Registereduser->save($this->data['Registereduser']) && $this->Applicant->save()) {
                        $this->Session->write('applicant_id', $this->Applicant->getLastInsertID());
                        $this->Session->write('registration_id', $this->Registereduser->getLastInsertID());
                        $this->Applicant->id = $this->Session->read('applicant_id');
                        $this->Applicant->saveField('registration_id', $this->Session->read('registration_id'));
                        $this->Registereduser->id = $this->Session->read('registration_id');
                        $this->Registereduser->saveField('applicant_id', $this->Session->read('applicant_id'));
                        $this->Session->setFlash('You have successfully registered.');
                        //$this->redirect(array('controller' => 'form', 'action' => 'pay'));
			$this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
                    }
                    else {
                        $this->Session->setFlash('There was an error in Registration.');
                    }
                }
                else {
                    $this->Session->setFlash('Data Validation Failure', 'default', array('class' =>
                        'cake-error'));
                }
            }
        }
        
        public function prepayment() {
        if (!empty($this->data['Applicant']['id']) && !empty($this->data['Applicant']['email']) 
                && !empty($this->data['Applicant']['date_of_birth'])) { 
            $segments = explode('/', $this->data['Applicant']['date_of_birth']);
            if (count($segments) !== 3 || !preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/", $this->data['Applicant']['date_of_birth'])) {
                $this->Session->setFlash('Date of Birth is not in correct format.');
                return false;
            }
            list($dd,$mm,$yyyy) = $segments;
            if (!checkdate((int)$mm,(int)$dd,(int)$yyyy)) {
                $this->Session->setFlash('Date of Birth is not in correct format.');
                return false;
            }
            if(!filter_var($this->data['Applicant']['email'], FILTER_VALIDATE_EMAIL)) {
                $this->Session->setFlash('Email Id is not in correct format.');
                return false;
            }
            $applicant_id = trim($this->data['Applicant']['id']);
            $registered_user = $this->Registereduser->find('all', array(
                'conditions' => array('Registereduser.applicant_id' => $applicant_id,
                    'Registereduser.email' => trim($this->data['Applicant']['email']),
                    'Registereduser.dob' => trim($this->data['Applicant']['date_of_birth']))));
            $applicants = $this->Applicant->find('all', array(
                'conditions' => array('Applicant.id' => $applicant_id)));
            if (count($registered_user) == 1 && count($applicants) == 1 
                    && $applicants['0']['Applicant']['response_code'] != "0") {
                $this->Session->write('applicant_id', $applicant_id);
                $this->redirect(array('controller' => 'form', 'action' => 'pay'));
            } else if(count($registered_user) == 1 && count($applicants) == 1 
                    && $applicants['0']['Applicant']['response_code'] == "0") {
                // Is the below message fine for showing to applicants
                $this->Session->setFlash('Payment has been done. Enter credentials to login.');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
            }
            else {
                $this->Session->setFlash('Details entered are not valid.');
                return false;
            }
        }
        else if(strcmp(Router::url(array('controller' => 'Form','action' => 'register'), true), $this->referer()) !== 0) {
            $this->Session->setFlash('Details entered are not complete.');
            return false;
        }
    }

    public function appliedposts() { 
        $posts_applied = $this->Post->find('all', array(
                        'conditions' => array('Post.reg_id' => $this->Session->read('registration_id'))));
                                              //'Post.final_submit' => '1')));
        $this->request->data = $posts_applied;
        //$this->Session->delete('applicant_id');
    }
        
        public function printform($post = null) {
            //$this->Session->delete('applicant_id');
            if(!empty($this->Session->read('registration_id'))) {
                $post_name = !empty($this->request->query['post']) ? $this->request->query['post'] : '';
                if(!(strcmp($post_name, "Professor") == 0 || strcmp($post_name, "Associate Professor") == 0 || strcmp($post_name, "Assistant Professor") == 0)) {
                    $this->Session->setFlash('Details entered are not valid in Post name.');
                    return false;
                }
                $applicant_id = !empty($this->request->query['id']) ? $this->request->query['id'] : '';
                if(!(is_numeric($applicant_id) && intval($applicant_id) > 0))  {
                    $this->Session->setFlash('Details entered are not valid in id.');
                    return false;
                }
                
                $posts_applied = $this->Post->find('all', array(
                            'conditions' => array('Post.reg_id' => $this->Session->read('registration_id'),
                                                  'Post.post_name' => $post_name,
                                                  'Post.applicant_id' => $applicant_id)
                                                ));
                if(count($posts_applied) == 1 && $posts_applied['0']['Post']['final_submit'] == '1') {
                    $this->layout = false;
                    $this->set('data_set', 'false');
                    $applicants = $this->Applicant->find('all', array(
                            'conditions' => array('Applicant.id' => $applicant_id)));
                    $education_arr = $this->Education->find('all', array(
                            'conditions' => array('Education.applicant_id' => $applicant_id)));

                    $exp_arr = $this->Experience->find('all', array(
                            'conditions' => array('Experience.applicant_id' => $applicant_id)));
                    $exp_arr_phd = $this->Experiencephd->find('all', array(
                            'conditions' => array('Experiencephd.applicant_id' => $applicant_id)));
                    $rpaper_arr = $this->Researchpaper->find('all', array(
                            'conditions' => array('Researchpaper.applicant_id' => $applicant_id)));
                    $rarticle_arr = $this->Researcharticle->find('all', array(
                            'conditions' => array('Researcharticle.applicant_id' => $applicant_id)));
                    $rproject_arr = $this->Researchproject->find('all', array(
                            'conditions' => array('Researchproject.applicant_id' => $applicant_id)));
                    $image = $this->Document->find('all', array(
                            'conditions' => array('Document.applicant_id' => $applicant_id)));
                    
                    if(count($applicants) == 1) {
                        $this->set('applicant', $applicants['0']);
                        $this->set('education_arr', $education_arr);
                        $this->set('exp_arr', $exp_arr);
                        $this->set('exp_arr_phd', $exp_arr_phd);
                        $this->set('rpaper_arr', $rpaper_arr);
                        $this->set('rarticle_arr', $rarticle_arr);
                        $this->set('rproject_arr', $rproject_arr);
                        $this->set('image', !empty($image['0']) ? $image['0'] : array());
                        $this->set('data_set', 'true');
                    }
                    else {
                        $this->Session->setFlash('An error has occured. Please contact Support.');
                        return false;
                    }
                }
            }
        }

	public function pay() {
                //print_r($this->Session->read('applicant_id')); return false;
                $registered_user = $this->Registereduser->find('all', array(
                    'conditions' => array('Registereduser.applicant_id' => $this->Session->read('applicant_id'))));
                $applicants = $this->Applicant->find('all', array(
                            'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
                if($applicants['0']['Applicant']['category'] == "SC" || $applicants['0']['Applicant']['category'] == "ST" 
                        || $applicants['0']['Applicant']['physically_disabled'] == "yes") {
                        $this->set('app_fee', '250');
                        $this->Session->write('payment_amount','250');
                }
                else {
                        $this->set('app_fee', '750');
                        $this->Session->write('payment_amount','750');
                }
                $this->set('Applicant', $applicants['0']['Applicant']);
                //}
                //else {
                    //$this->Session->setFlash('Invalid Applicant ID.');
                    //$this->redirect(array('controller' => 'form', 
                                              //'action' => 'register'));
                //}
	}

	public function post() {
		//print_r($this->request->data);
		$HASHING_METHOD = 'sha512'; // md5,sha1
		$ACTION_URL = "https://secure.ebs.in/pg/ma/payment/request/";

		$this->set('ACTION_URL',$ACTION_URL);		
		if(isset($_POST['secretkey']))
			$_SESSION['SECRET_KEY'] = $_POST['secretkey'];
		else
			$_SESSION['SECRET_KEY'] = ''; //set your secretkey here
			
		$hashData = $_SESSION['SECRET_KEY'];

		unset($_POST['secretkey']);
		unset($_POST['submitted']);

		ksort($_POST);
		foreach ($_POST as $key => $value) {
			if (strlen($value) > 0) {
				if($key == "amount") {
					$hashData .= '|'. $this->Session->read('payment_amount');
				}
				else {
					$hashData .= '|'.$value;
				}
			}
		}
		if (strlen($hashData) > 0) {
			$secureHash = strtoupper(hash($HASHING_METHOD, $hashData));
			$this->set('secureHash', $secureHash);
		}
	}
        
        function validate_amount($amount) {
            if(isset($amount) && ($amount === "750" || $amount === "250")) {
                return $amount;
            }
            else 
                return "750";
        }
        
	public function returnpg() {
		$HASHING_METHOD = 'sha512'; // md5,sha1

		// This response.php used to receive and validate response.
		if(!isset($_SESSION['SECRET_KEY']) || empty($_SESSION['SECRET_KEY']))
		$_SESSION['SECRET_KEY'] = ''; //set your secretkey here
			
		$hashData = $_SESSION['SECRET_KEY'];
		ksort($_POST);
		foreach ($_POST as $key => $value){
			if (strlen($value) > 0 && $key != 'SecureHash') {
				$hashData .= '|'.$value;
			}
		}
		if (strlen($hashData) > 0) {
			$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
	
			if($secureHash == $_POST['SecureHash']){
				
				if($_POST['ResponseCode'] == 0){
					// update response and the order's payment status as SUCCESS in to database
					
					$this->Applicant->create();
            				$this->Applicant->id = $this->Session->read('applicant_id');
					$this->Applicant->set(array('response_code' => $_POST['ResponseCode'],
								    'payment_date_created' => $_POST['DateCreated'],
								    'payment_id' => $_POST['PaymentID'],
								    'payment_amount' => $_POST['Amount'],
								    'payment_transaction_id' => $_POST['TransactionID']));
            				if ($this->Applicant->id) {
                				$this->Applicant->save();
            				}
            				//$this->redirect(array('controller' => 'form', 'action' => 'appliedposts'));
					//for demo purpose, its stored in session
					$_POST['paymentStatus'] = 'SUCCESS';
					$_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
					$this->set('paymentStatus', $_POST['ResponseCode']);
					$this->set('paymentStatusStr', 'SUCCESS');
					$this->set('transID', $_POST['TransactionID']);
					$this->set('tras_amount', $_POST['Amount']);
					
				} else {
					// update response and the order's payment status as FAILED in to database
					$this->set('error_mesg', $_POST['Error']);
					//for demo purpose, its stored in session
					$_POST['paymentStatus'] = 'FAILED';
					$_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
				}
				// Redirect to confirm page with reference.
				$confirmData = array();
				$confirmData['PaymentID'] = $_POST['PaymentID'];
				$confirmData['Status'] = $_POST['paymentStatus'];
				$confirmData['Amount'] = $_POST['Amount'];
				
				$hashData = $_SESSION['SECRET_KEY'];

				ksort($confirmData);
				foreach ($confirmData as $key => $value){
					if (strlen($value) > 0) {
						$hashData .= '|'.$value;
					}
				}
				if (strlen($hashData) > 0) {
					$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
				}
			} else {
				echo '<h1>Error!</h1>';
				echo '<p>Hash validation failed</p>';
			}
		} else {
			echo '<h1>Error!</h1>';
			echo '<p>Invalid response</p>';
		}
	}

	public function print_bfs() {
            $this->layout = false;
            $this->set('data_set', 'false');
            $applicants = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            if(count($applicants) == 0) {
                $this->redirect('/multi_step_form/wizard/first');
                return false;
            }
            $education_arr = $this->Education->find('all', array(
                    'conditions' => array('Education.applicant_id' => $this->Session->read('applicant_id'))));

            $exp_arr = $this->Experience->find('all', array(
                    'conditions' => array('Experience.applicant_id' => $this->Session->read('applicant_id'))));
            $exp_arr_phd = $this->Experiencephd->find('all', array(
                    'conditions' => array('Experiencephd.applicant_id' => $this->Session->read('applicant_id'))));
            $rpaper_arr = $this->Researchpaper->find('all', array(
                    'conditions' => array('Researchpaper.applicant_id' => $this->Session->read('applicant_id'))));
            $rarticle_arr = $this->Researcharticle->find('all', array(
                    'conditions' => array('Researcharticle.applicant_id' => $this->Session->read('applicant_id'))));
            $rproject_arr = $this->Researchproject->find('all', array(
                    'conditions' => array('Researchproject.applicant_id' => $this->Session->read('applicant_id'))));
            $image = $this->Document->find('all', array(
                    'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
            //$apiscore = $this->ApiScore->find('all', array(
            //        'conditions' => array('ApiScore.applicant_id' => $this->Session->read('applicant_id'))));

            //$misc = $this->Applicant->find('all', array(
            //        'conditions' => array('Misc.user_id' => $this->Session->read('applicant_id'))));                
            if(count($applicants) == 0) {
                $this->Session->setFlash('Please complete your form in sequence.');
                return false;
            }		
            if(count($applicants) == 1) {
                //$this->set('postAppliedFor', $this->getPostAppliedFor());
                $this->set('applicant', $applicants['0']);
                $this->set('education_arr', $education_arr);
                $this->set('exp_arr', $exp_arr);
                $this->set('exp_arr_phd', $exp_arr_phd);
                $this->set('rpaper_arr', $rpaper_arr);
                $this->set('rarticle_arr', $rarticle_arr);
                $this->set('rproject_arr', $rproject_arr);
                //$this->set('apiscore', $apiscore['0']);
                //$this->set('miscexp', $miscexp['0']);
                //$this->set('academic_dist', $adacdemic_dist);
                $this->set('image', !empty($image['0']) ? $image['0'] : array());
                //$this->set('researchpapers', $researchpapers);
                //$this->set('researcharticles', $researcharticles);
                //$this->set('misc', $misc['0']);
                $this->set('data_set', 'true');
            }
            else {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
	}

	public function final_submit() {
                $applicants = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
                $this->Applicant->create();
		$this->Applicant->id = $this->Session->read('applicant_id');
                $this->Post->create();
                $this->Post->set(['reg_id' => $this->Session->read('registration_id'),
                                  'applicant_id' => $this->Session->read('applicant_id'),
                                  'final_submit' => '1',
                                  'post_name' => $applicants[0]['Applicant']['post_applied_for'],
                                  'area' => $applicants[0]['Applicant']['area_of_sp'],
                                  'centre' => $applicants[0]['Applicant']['centre']]);
                if (!empty($this->Applicant->id) && $this->Applicant->saveField('final_submit', "1")
                        && $this->Post->save()) {
                    //$this->Session->delete('applicant_id');
                    $this->redirect(array('controller' => 'form', 'action' => 'appliedposts'));
            	}
                $this->Session->setFlash('An error has occured in final submission. Please contact Support.');
            	return false;
		//$this->redirect(array('controller' => 'users', 'action' => 'logout'));
	}

	function getPostAppliedFor() {
        	$current_post_applied = !empty($this->request->query['post']) ? $this->request->query['post'] : NULL;
        	if (!empty($current_post_applied)) {
            		//$this->set('postAppliedFor', $current_post_applied);
            		$this->Session->write('post_applied_for', $current_post_applied);
            		return $current_post_applied;
        	} else if (!empty($this->Session->read('post_applied_for'))) {
            		//$this->set('postAppliedFor', $this->Session->read('post_applied_for'));
            		return $this->Session->read('post_applied_for');
        	} else {
            		$this->Session->setFlash('Please select a post and then continue.');
            		$this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
        	}
    	}

}

?>
