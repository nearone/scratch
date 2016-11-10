<?php

/**
 * Description of Connection
 *
 * @author Arnaud Leroux
 */
abstract class Library_Db_Master {
    
    public $db;

    private function __construct() {

        $this->db = Library_Core_Connection::getInstance();
    }

}
