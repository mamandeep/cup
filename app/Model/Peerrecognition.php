<?php

class Peerrecognition extends AppModel {
    
    public $useTable = 'peerrecognition';
    
    //var $inserted_ids = array();
            
    var $validate = array(
        'applicant_id',
        'award_honour',
        'agency',
        'year'
    );
    
    
    /*function afterSave($created, $options = array()) {
        if($created) {
            $this->inserted_ids[] = $this->getInsertID();
        }
        return true;
    }*/

}

