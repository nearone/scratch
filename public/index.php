<?php


defined('APPLICATION_PATH') || define('APPLICATION_PATH', dirname(__FILE__) . "/../application/");
defined('LIBRARY_PATH') || define('LIBRARY_PATH', dirname(__FILE__) . "/../application/library/");
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

//autoloader
require_once APPLICATION_PATH . "Library/Autoloader.php";
Library_Autoloader::register();

//twig autoloader
require_once LIBRARY_PATH . '/twig/Autoloader.php';
Twig_Autoloader::register();

$oBoostrap = new Library_Bootstrap();
$oBoostrap->init($_REQUEST);


