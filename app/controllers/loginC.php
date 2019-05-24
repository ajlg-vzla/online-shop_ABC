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
            $controller->showError('Incorrect username or password');
        }
        else
        {
            header('Location: ../products/read');
        }

        var_dump($user);
    }
}