<?php

class Post extends AppModel {

    public $useTable = 'post';
    
    var $validate = array(
        'email' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'dob' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'post_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'post_code' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        )
    );
}

?>

