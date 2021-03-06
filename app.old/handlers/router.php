<?php

class Router
{
    public function Route(Request $request)
    {
        $controller = $request->getController().'C';
        $method = $request->getMethod();
        $args = $request->getArgs();

        $controllerFile = CONTROLLERS.$controller.'.php';

        if(is_readable($controllerFile))
        {
            require_once $controllerFile;
            $controller = new $controller;
            $method = (is_callable(array($controller,$method))) ? $method : 'index';	
            
            if(!empty($args))
            {
                call_user_func_array(array($controller,$method),$args);
            }
            else
            {	
                call_user_func(array($controller,$method));
            }	
            return;
        }
        throw new Exception('404 - '.$request->getController().' not found');
    }
}