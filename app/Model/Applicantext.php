<?php

App::uses('CakeSession', 'Model/Datasource');

class Applicantext extends AppModel {

    //public $belongsTo = 'User';
    public $useTable = 'applicant';
    var $validate = array(
        'appId',
        'time_req_for_joining' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'mem_pro_bodies' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^yes|no$/i',
                 'message'   => 'Only Yes / No allowed'
            ),
            'mem_if_yes' => array(
                'rule' => array('checkmembership', 'mem_details'),
                'message' => 'Please fill Membership Details below.'
            )
        ),
        'mem_details' => array(
            'length' => array (
                'rule' => array('maxLength', 1000),
                'message' => 'This field has crossed allowed limit.',
                'allowEmpty' => true
            )
        ),
        'convicted' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^yes|no$/i',
                 'message'   => 'Only Yes / No allowed'
            )
        ),
        'pending_court' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^yes|no$/i',
                 'message'   => 'Only Yes / No allowed'
            )
        ),
        'willg_min_pay' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^yes|no$/i',
                 'message'   => 'Only Yes / No allowed'
            ),
            'mem_if_yes' => array(
                'rule' => array('checkminpay', 'min_pay_no'),
                'message' => 'Please fill Reasons below.'
            )
        ),
        'min_pay_no' => array(
            'length' => array (
                'rule' => array('maxLength', 1000),
                'message' => 'This field has crossed allowed limit.',
                'allowEmpty' => true
            )
        ),
        'total_self_att_docs_att' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        )
    );
    
    public function checkmembership ($data, $mem_details) {
        if(strcmp($data['mem_pro_bodies'], 'no') === 0)  {
            return true;
        }
        return (strcmp($data['mem_pro_bodies'], 'yes') === 0 && strlen($this->data[$this->alias][$mem_details]) > 0) ? true : false;
    }
    
    public function checkminpay ($data, $minpay) {
        if(strcmp($data['willg_min_pay'], 'yes') === 0)  {
            return true;
        }
        return (strcmp($data['willg_min_pay'], 'no') === 0 && strlen($this->data[$this->alias][$minpay]) > 0) ? true : false;
    }
}
        
?>

