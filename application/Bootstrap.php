<?php

/**
 * Description of newPHPClass
 *
 * @author arnlerou
 */
class Bootstrap {

    static $config;

    function __construct() {

        self::$config = parse_ini_file(APPLICATION_PATH . "/configs/application.ini", true);
    }

    public function init($aInputs) {
        
        $sController = $this->getController($aInputs);
        
        exit('fff');

        $sClass = "Logic_" . ucfirst($sClass);
        $oClass = Factory::$sClass();
        if (is_object($oClass)) {
            $oClass->render();
        }
    }
    
    private function getController($aInputs){
        
        
        
    }
    
    

}
