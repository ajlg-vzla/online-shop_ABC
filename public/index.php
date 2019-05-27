<?php

define('SITE_PATH',realpath(dirname(__DIR__)).DIRECTORY_SEPARATOR);

define('CONTROLLERS',SITE_PATH.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR);
define('VIEWS',SITE_PATH.'app'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
define('MODELS',SITE_PATH.'app'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR);
define('ENTITIES',SITE_PATH.'app'.DIRECTORY_SEPARATOR.'entities'.DIRECTORY_SEPARATOR);

require_once(SITE_PATH.'app'.DIRECTORY_SEPARATOR.'handlers/request.php');
require_once(SITE_PATH.'app'.DIRECTORY_SEPARATOR.'handlers/router.php');

require_once(SITE_PATH.'app'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'connection.php');
require_once(SITE_PATH.'app'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'credentials.php');

require_once(CONTROLLERS.'mainC.php');
require_once(CONTROLLERS.'homeC.php');
require_once(CONTROLLERS.'productsC.php');
require_once(CONTROLLERS.'errorC.php');

require_once(ENTITIES.'user.php');
require_once(ENTITIES.'shoppingCart.php');

session_start();

try{
    Router::route(new Request);
}catch(Exception $e){
    $controller = new errorC;
    $controller->showError($e->getMessage());
}