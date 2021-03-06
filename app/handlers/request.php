<?php

// receive url request from the web browser
class Request
{
    private $controller;
    private $method;
    private $args;

    public function __construct()
    {
        //  url must have the following structure for the app to show a valid view
        //  ../controller/method/parameter1/parameter2...
        $parts = explode('/',$_SERVER['REQUEST_URI']);
        $parts = array_filter($parts);
        array_shift($parts);
        //  using 'products' as a default controller and 'read' as a default method
        //  parameters not needed
        $this->controller = ($c = array_shift($parts))? $c: 'products';
        $this->method = ($c = array_shift($parts))? $c: 'read';
        $this->args = (isset($parts[0])) ? $parts : array();
    }

    public function getController(){
        return $this->controller;
    }
    public function getMethod(){
        return $this->method;
    }
    public function getArgs(){
        return $this->args;
    }
}	