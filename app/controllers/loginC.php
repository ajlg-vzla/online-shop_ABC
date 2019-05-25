<?php

class LoginC extends MainC
{
    public function __construct()
    {
        $this->loginModel = $this->model('Login');
    }

    public function index()
    {
        $this->view('login');
    }

    public function tryLogin()
    {
        $credentials =
        [
            'name' => $_REQUEST['name'],
            'password' => $_REQUEST['password']
        ];

        $user = $this->loginModel->tryLogin($credentials);

        if(empty($user))
        {
            $controller = new errorC;
            $controller->showError('Login failed, please try again...');
        }
        else
        {
            $loggedUser = new User($user[0]->name, $user[0]->balance);
            $controller = new productsC;
            $controller->read($loggedUser);
            
        }
    }
}