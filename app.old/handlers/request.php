<?php

class Request
{
    private $controller;
    private $method;
    private $args;

    public function __construct()
    {
        $parts = explode('/',$_SERVER['REQUEST_URI']);
        $parts = array_filter($parts);
        array_shift($parts);
        $this->controller = ($c = array_shift($parts))? $c: 'home';
        $this->method = ($c = array_shift($parts))? $c: 'index';
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