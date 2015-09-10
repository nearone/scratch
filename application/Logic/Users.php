<?php

/**
 * Description of Logic_Homepage
 *
 * @author Arnaud Leroux
 */
class Logic_Users extends Library_Template {

    public function index() {

        $this->render();
    }

    public function modify() {

        $this->render('users/modify');
    }

    public function add() {

        $this->render('users/modify');
    }

    public function save() {

        $oForm = new Form_Users_Save();

        try {

            if (!$oForm->isValid($_POST)) {
                throw new Exception(Library_Form::FORM_ERROR_MESSAGE, Library_Form::FORM_ERROR_CODE);
            }

            $aInputs = $oForm->getValues($_POST);
        } catch (Exception $e) {
            switch ($e->getCode()) {
                case Library_Form::FORM_ERROR_CODE:
                    $this->aVars['aErrors'] = $oForm->getErrors();
                    break;
                default:
            }
        }
        
        $this->modify();
    }

}
