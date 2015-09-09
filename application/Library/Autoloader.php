<?php

class Library_Autoloader
{

    const NOT_FOUND = "Class not found.";
    const NOT_FOUND_CODE = 1000;

    public static function register($prepend = false)
    {
        if (PHP_VERSION_ID < 50300) {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        } else {
            spl_autoload_register(array(__CLASS__, 'autoload'), true, $prepend);
        }
    }

    public static function autoload($sClass)
    {

        $sPath = str_replace("_", "/", $sClass) . '.php';

        if (file_exists(APPLICATION_PATH . $sPath)) {
            include APPLICATION_PATH . $sPath;
        }
    }

}
