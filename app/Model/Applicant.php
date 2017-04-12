<?php

App::uses('CakeSession', 'Model/Datasource');

class Applicant extends AppModel {

    //public $belongsTo = 'User';
    public $useTable = 'applicant';
    
    var $validate = array(
        'appId',
        'advertisement_no' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'post_applied_for' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'appfee_dd_no' => array('paymentValidation'),
        'appfee_dd_date' => array('paymentValidation'),
        'appfee_dd_amt' => array('paymentValidation'),
        'appfee_dd_bank' => array('paymentValidation'),
        'appfee_dd_branch' => array('paymentValidation'),
        'challan_no' => array('paymentValidation'),
        'challan_date' => array('paymentValidation'),
        'centre' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'area' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'specialization' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'first_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        /*'middle_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),*/
        'last_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'It must be a valid email address'
        ),
        'mobile_no' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'father_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        //'father_email',
        //'father_mobile',
        'mother_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        //'mother_email',
        //'mother_mobile',
        'date_of_birth' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'marital_status' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'gender' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'spouse_name',
        'category' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'category_applied' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'aadhar_no',
        'nationality' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'physically_disabled' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'departmental_cand' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
	'internal_cand' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'blindness_applicable',
        'blindness_percentage',
        'hearing_applicable',
        'hearing_percentage',
        'locomotor_applicable',
        'locomotor_percentage',
        'mailing_address' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'permanent_address' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'time_req_for_joining' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'total_self_att_docs_att' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        )
        
    );

    function beforeSave($options = array()) {
        /*if (empty($this->data[$this->alias]['appId']))   {
            $digits = 8;
            $appId = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $this->data[$this->alias]['appId'] = $appId;
            //$this->data[$this->alias]['user_id'] = CakeSession::read('applicant_id');
        }*/
        //print_r($this->data); return false;
        return $this->data;
    }
    
    function beforeValidate($options = array()) {
        
    }
    

    function paymentValidation($data) {
        return ((!empty($this->data[$this->alias]['appfee_dd_no'])
               && !empty($this->data[$this->alias]['appfee_dd_date'])
               && !empty($this->data[$this->alias]['appfee_dd_amt'])
               && !empty($this->data[$this->alias]['appfee_dd_bank'])
               && !empty($this->data[$this->alias]['appfee_dd_branch'])));
                /*||
                (!empty($this->data[$this->alias]['challan_no'])
                && !empty($this->data[$this->alias]['challan_date']))
                );*/
    }

}

?>
