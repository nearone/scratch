<?php

/**
 * Description of Logic_Template
 *
 * @author Arnaud Leroux
 */
class Library_Template {

    private $_sTemplatePath;
    public $aVars;

    public function __construct($aOptions = array()) {
        $this->_sTemplatePath = "{$aOptions[0]}/{$aOptions[1]}";
    }

    public function render($sTemplatePath = null) {

        $sTemplatePath = !is_null($sTemplatePath) ? $sTemplatePath : $this->_sTemplatePath;
        $aVars = $this->aVars;
        
        include(APPLICATION_PATH . "Templates/{$sTemplatePath}.php");
    }

}
