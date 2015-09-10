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

        $this->render();
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
            $this->handleErrors($oForm);
        }



        exit('stop');
    }

    public function handleErrors($oForm) {
        switch ($e->getCode()) {
            case "":
                break;
            default:
        }
        $oForm->getErrors();
    }

}
