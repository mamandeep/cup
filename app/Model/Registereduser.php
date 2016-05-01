<?php

App::uses('CakeSession', 'Model/Datasource');

class Registereduser extends AppModel {

    //public $belongsTo = 'User';
    
    public $useTable = 'registered_users';
    
    var $validate = array(
        'email' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'dob' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        )
    );

}

?>
