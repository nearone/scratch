<?php


defined('APPLICATION_PATH') || define('APPLICATION_PATH', dirname(__FILE__) . "/../application/");
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

//autoloader
require_once APPLICATION_PATH . "Library/Autoloader.php";
Library_Autoloader::register();

$oBoostrap = new Library_Bootstrap();
$oBoostrap->init($_REQUEST);


