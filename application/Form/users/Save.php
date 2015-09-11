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
class Form_Users_Save extends Library_Form {

    public function __construct() {

        $this->_aFields['id'] = array(
            "clean" => array("trim"),
            "validate" => array("integer")
        );
        $this->_aFields['firstname'] = array(
            "belongsTo" => "contact",
            "clean" => array("trim"),
            "validate" => array("required", "string")
        );
        $this->_aFields['lastname'] = array(
            "clean" => array("trim"),
            "validate" => array("required", "string")
        );
        $this->_aFields['email'] = array(
            "clean" => array("trim"),
            "validate" => array("required", "email")
        );
    }

}
