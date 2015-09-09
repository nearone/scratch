<?php

class Library_Factory
{

    const NOT_FOUND = "Class not found.";
    const NOT_FOUND_CODE = 2000;

    public static function __callStatic($sClass, $arguments)
    {

        //check if class exists
        if (@class_exists($sClass)) {
            return new $sClass($arguments);
        }
    }

}
