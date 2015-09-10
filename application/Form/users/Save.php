<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form_Users_Save
 *
 * @author arnlerou
 */
class Form_Users_Save {

    private $_aFields = array();

    public function __construct() {
        
        $this->_aFields['firstname'] = array(
            "required" => true,
            ""
        );
        
    }
    
    public function isValid(){}
    
    public function getValues(){}
    
    public function getErrors(){}

}
