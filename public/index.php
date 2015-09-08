<?php

define('APPLICATION_PATH', dirname(__FILE__) . "/../application/");

//autoloader
require_once APPLICATION_PATH . "Autoloader.php";

Autoloader::register();
$oBoostrap = new Bootstrap();
$oBoostrap->init($_REQUEST);


