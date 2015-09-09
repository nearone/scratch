<?php

/**
 * Description of Connection
 *
 * @author Arnaud Leroux
 */
class Library_Core_Connection {

    private static $_instance = null;
    public $db;

    private function __construct() {

        mb_internal_encoding('UTF-8');
        mb_http_output('UTF-8');

        $this->db = new \PDO(
                'mysql:host=' . Library_Bootstrap::$config->db_host . ';dbname=' . Library_Bootstrap::$config->db_name . ';charset=utf8mb4', Library_Bootstrap::$config->db_username, Library_Bootstrap::$config->db_password, array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
                )
        );
    }

    public static function getInstance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new Library_Core_Connection();
        }

        return self::$_instance;
    }

}
