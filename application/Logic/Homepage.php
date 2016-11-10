<?php

/**
 * Description of Logic_Homepage
 *
 * @author Arnaud Leroux
 */
class Logic_Homepage extends TwigTemplate {

    public function index() {

        $this->vars = array('test' => 'hello');

        echo $this->render('index.html.twig', array('hiphop' => 'test'));
    }

}
