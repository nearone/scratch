<?php

/**
 * Description of newPHPClass
 *
 * @author arnlerou
 */
class Library_Bootstrap {

    static $config;

    function __construct() {

        $oConfig = parse_ini_file(APPLICATION_PATH . "/Configs/application.ini", true);
        self::$config = (object) $oConfig[APPLICATION_ENV];
    }

    public function init($aInputs) {

        $sPath = isset($aInputs['page']) ? $aInputs['page'] : '';
        $aParams = explode('/', $sPath);
        $sController = isset($aParams[0]) && $aParams[0] != '' ? $aParams[0] : self::$config->default_controller;
        $sAction = isset($aParams[1]) && $aParams[1] != '' ? $aParams[1] : self::$config->default_action;

        $sClass = "Logic_" . ucfirst($sController);
        $oClass = Library_Factory::$sClass($sController, $sAction);

        if (!is_object($oClass)) {
            $sController = self::$config->default_controller;
            $sAction = self::$config->default_action;
        }

        if (is_object($oClass)) {
            $oClass->{$sAction}();
        }
    }

}
