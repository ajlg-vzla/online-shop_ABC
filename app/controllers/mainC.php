<?php

//  main controller, used with 'extend' on every other controller, here we set up and link the
//  views and models to its designated controller
class MainC
{
    public function model($model)
    {
        require_once(MODELS.$model.'.php');
        return new $model();
    }

    public function view($name, $parameters = [])
    {
        if(file_exists(VIEWS.$name.'.phtml'))
        {
            require_once(VIEWS.$name.'.phtml');
        }
        else
        {
            require_once(VIEWS.'error/read.phtml');
        }
    }
}