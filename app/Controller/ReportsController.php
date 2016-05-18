<?php

App::uses('ConnectionManager', 'Model');

class ReportsController extends AppController {

    var $components = array('Captcha.Captcha'=>array('Model'=>'Signup', 
                        'field'=>'security_code'));//'Captcha.Captcha'

    var $uses = array('Signup', 'Registereduser','Post','Applicant','Education','Experience','Image', 'Misc', 'Researchpaper','Researcharticle', 'Researchproject', 'Document', 'ApiScore');                
    
    public $helpers = array('Captcha.Captcha');
    
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('login','add','logout'); 
        if(!$this->Session->check('registration_id')) {
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
    }
	

    function captcha()  {
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha.Captcha'); //load it
        }
        $this->Captcha->create();
    }
    
    public function index() {
        $param = "";
        if(isset($this->params['url']['t'])) 
            $param = $this->params['url']['t'];
        if(isset($this->params['url']['nt']))
            $param = $this->params['url']['nt'];
        switch($param) {
            case 't' :
                $this->generateReportTeaching();
                break;
            case 'nt':
                $this->generateReportNonTeaching();
                break;
            default :
                if(strcmp(Router::url(array('controller' => 'form','action' => 'generalinformation'), true), $this->referer()) !== 0) {
                    $this->Session->setFlash('Please select a report type.');
                }
        }
    }
    
    private function generateReportTeaching() {
        $current_datetime = new DateTime();
        $current_datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
        //$current_datetime->format('d-m-y:H-i-s');
        $fileName = "report_t_".$current_datetime->format('d-m-y:H-i-s').".xls";
        $headerRow = array("Post Applied For", "Centre", "First Name", "Middle Name", "Last Name");
        
        $db = ConnectionManager::getDataSource('default');
        $sql = "SELECT post_applied_for, centre, first_name, middle_name, last_name FROM `applicant`";
        $result = $db->query($sql);
        /*$count_r = 0;
        while ($row = $db->fetchRow()) { 
            $this->Session->write('registration_id', $row['registered_users']['id']);
            $this->Session->write('applicant_id', $row['registered_users']['applicant_id']);
            $count_r++;
        }*/
                
        $this->exportInExcel($fileName, $headerRow, $result, 't');
    }
    
    private function generateReportNonTeaching() {
        $current_datetime = new DateTime();
        $current_datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
        //$current_datetime->format('d-m-y:H-i-s');
        $fileName = "report_nt_".$current_datetime->format('d-m-y:H-i-s').".xls";
        //$fileName = "bookreport_".date("d-m-y:h:s").".xls";
        //$fileName = "bookreport_".date("d-m-y:h:s").".csv";
        $headerRow = array("id", "first_name", "middle_name", "last_name", "gender", "email", "mobile_no", "father_name", "mother_name", "name_of_centre", "specialization", "date_of_birth", "marital_status", "spouse_name", "category", "aadhar_no", "response_code", "payment_date_created", "payment_id", "payment_amount", "payment_transaction_id", "gaps_in_education", "physical_disable", "departmental_cand" , "internal_cand", "landline_no", "mailing_address", "perm_address" , "post_name", "final_submit", "Qualification", "Experience");
                                           
        $db = ConnectionManager::getDataSource('nonteaching');
        $sql = "select 
                a1.id, a1.first_name, a1.middle_name, a1.last_name, a1.gender, a1.email, a1.mobile_no, p1.post_name, p1.final_submit, a1.father_name, a1.mother_name, 
                a1.name_of_centre, a1.specialization, a1.date_of_birth, a1.marital_status, a1.spouse_name, a1.category, a1.aadhar_no ,
                a1.response_code, a1.payment_date_created, a1.payment_id, a1.payment_amount, a1.payment_transaction_id,
                a1.gaps_in_education, a1.physical_disable, a1.departmental_cand, a1.internal_cand,
                a1.landline_no, a1.mailing_address, a1.perm_address,
                q1.Qualification, exp.Experience
                from applicants a1
                left outer join (
                        select e1.user_id, GROUP_CONCAT(concat_ws(';', e1.course , e1.board , e1.year_of_passing , e1.percentage 
                        , e1.marks_obtained , e1.max_marks , e1.roll_no , e1.subjects) SEPARATOR '\n') as Qualification 
                        from education e1
                        group by e1.user_id) q1 
                on a1.id = q1.user_id
                left outer join (
                        select e2.user_id, GROUP_CONCAT(concat_ws(';', e2.designation , e2.scale_of_pay , e2.name_add , e2.from_date 
                        , e2.to_date , e2.no_of_yrs_mnths , e2.nature_of_work) SEPARATOR '\n') as Experience 
                        from experience e2
                        group by e2.user_id) exp
                on a1.id = exp.user_id
                left outer join posts p1
                on a1.id = p1.user_id";
        $result = $db->query($sql);
        /*$count_r = 0;
        while ($row = $db->fetchRow()) { 
            $this->Session->write('registration_id', $row['registered_users']['id']);
            $this->Session->write('applicant_id', $row['registered_users']['applicant_id']);
            $count_r++;
        }*/
        //print_r($result);        
        $this->exportInExcel($fileName, $headerRow, $result, 'nt');
    }

    function exportInExcel($fileName, $headerRow, $data, $type) {
        ini_set('max_execution_time', 1600); //increase max_execution_time to 10 min if data set is very large
        $fileContent = implode("\t ", $headerRow)."\n";
        foreach($data as $result) {
            if($type == "t") {
                $fileContent .=  implode("\t ", $result['applicant'])."\n";
            }
            else if($type == "nt") {
                $fileContent .=  implode("\t ", $result['a1']);
                $fileContent .=  implode("\t ", $result['p1']);
                $fileContent .=  implode("\t ", $result['q1']);
                $fileContent .=  implode("\t ", $result['exp'])."\n";
            }
        }
        header('Content-type: application/ms-excel'); /// you can set csv format
        header('Content-Disposition: attachment; filename='.$fileName);
        echo $fileContent;
        exit;
    }
    
    function cleanData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
    }
    
    public function generalinformation() {
           $applicants = $this->Applicant->find('all', array(
                'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            if (count($applicants) == 1 ) {
                $this->set('applicant', $applicants['0']);
            }
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
                        'advertisement_no' => 'T-01 (2016)'));
                    
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
            /*$posts_applied = $this->Post->find('all', array(
                        'conditions' => array('Post.registration_id' => $this->Session->read('registration_id'))));
                                              //'Post.final_submit' => '1')));
            $this->request->data = $posts_applied;*/
        }
        
        public function printform($post = null) { 
            if(!empty($this->Session->read('registration_id'))) {
                $post_name = !empty($this->request->query['post']) ? $this->request->query['post'] : '';
                $posts_applied = $this->Post->find('all', array(
                            'conditions' => array('Post.registration_id' => $this->Session->read('registration_id'),
                                                  'Post.post_name' => $post_name)
                                                ));
                if(count($posts_applied) == 1 && $posts_applied['0']['Post']['final_submit'] == '1') {
                    $applicant_id = $posts_applied['0']['Post']['user_id'];
                    $this->layout = false;
                    $this->set('data_set', 'false');
                    $applicants = $this->Applicant->find('all', array(
                            'conditions' => array('Applicant.id' => $applicant_id)));
                    $education_arr = $this->Education->find('all', array(
                            'conditions' => array('Education.user_id' => $applicant_id)));
                    $exp_arr = $this->Experience->find('all', array(
                            'conditions' => array('Experience.user_id' => $applicant_id)));
                    $publications_arr = $this->Researchpaper->find('all', array(
                            'conditions' => array('Researchpaper.user_id' => $this->Session->read('applicant_id'))));
                    $image = $this->Image->find('all', array(
                            'conditions' => array('Image.user_id' => $applicant_id)));
                    $misc = $this->Misc->find('all', array(
                            'conditions' => array('Misc.user_id' => $applicant_id)));                
                    if(count($applicants) == 1 && count($misc) == 1) {
                        $this->set('postAppliedFor', $post_name);
                        $this->set('applicant', $applicants['0']);
                        $this->set('education_arr', $education_arr);
                        $this->set('exp_arr', $exp_arr);
                        $this->set('publication_arr', $publications_arr);
                        $this->set('image', !empty($image['0']) ? $image['0'] : array());
                        $this->set('misc', $misc['0']);
                        $this->set('data_set', 'true');
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
                if($registered_user['0']['Registereduser']['category'] == "SC" || $registered_user['0']['Registereduser']['category'] == "ST" 
                        || $registered_user['0']['Registereduser']['physically_disabled'] == "yes") {
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
            $rpaper_arr = $this->Researchpaper->find('all', array(
                    'conditions' => array('Researchpaper.applicant_id' => $this->Session->read('applicant_id'))));
            $rarticle_arr = $this->Researcharticle->find('all', array(
                    'conditions' => array('Researcharticle.applicant_id' => $this->Session->read('applicant_id'))));
            $rproject_arr = $this->Researchproject->find('all', array(
                    'conditions' => array('Researchproject.applicant_id' => $this->Session->read('applicant_id'))));
            $image = $this->Document->find('all', array(
                    'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
            $apiscore = $this->ApiScore->find('all', array(
                    'conditions' => array('ApiScore.applicant_id' => $this->Session->read('applicant_id'))));

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
                $this->set('rpaper_arr', $rpaper_arr);
                $this->set('rarticle_arr', $rarticle_arr);
                $this->set('rproject_arr', $rproject_arr);
                $this->set('apiscore', $apiscore['0']);
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
		$this->Applicant->id = $this->Session->read('applicant_id');
                if (!empty($this->Applicant->id)) {
                	$this->Applicant->saveField('final_submit', "1");
            	}
		//$this->Session->delete('applicant_id');
            	$this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
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
