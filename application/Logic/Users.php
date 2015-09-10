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
    
    public function save(){
        
              
    }

}
