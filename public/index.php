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

require_once(CONTROLLERS.'MainC.php');
require_once(CONTROLLERS.'ProductsC.php');
require_once(CONTROLLERS.'ErrorsC.php');

require_once(ENTITIES.'User.php');
require_once(ENTITIES.'ShoppingCart.php');
require_once(ENTITIES.'Rating.php');
require_once(ENTITIES.'Product.php');

session_start();

try{
    $router = new Router();
    $router->Route(new Request);
    //Router::route(new Request);
}catch(Exception $e){
    $controller = new ErrorsC;
    $controller->showError($e->getMessage());
}