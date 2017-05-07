<?php

class NewAPIScore extends AppModel {
    
    public $useTable = 'applicant';
            
    var $validate = array(
        'apiscore_cat_2' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'apiscore_cat_3' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'totalapiscore_cat_2_3' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => false,
                'required' => true,
            ),
            'sum' => array(
                'rule' => 'checksum',
                'message' => 'Sum of API Score II and III does not match.',

            )
        )
    );
    
    public function checksum($check)
    {
        //debug($check); debug($this->data[$this->alias]);
        return (intval($check['totalapiscore_cat_2_3']) === (intval($this->data[$this->alias]['apiscore_cat_2']) + intval($this->data[$this->alias]['apiscore_cat_3'])));
    }
    
    

}

?>
