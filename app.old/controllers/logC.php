<?php

class LogC extends MainC
{
    public function __construct()
    {
        $this->logModel = $this->model('log');
    }

    public function login()
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

        $user = $this->logModel->tryLogin($credentials);

        if(empty($user))
        {
            $controller = new errorC;
            $controller->showError('Login failed, please try again...');
        }
        else
        {
            $loggedUser = new User($user[0]->id, $user[0]->name, $user[0]->balance);
            $controller = new productsC;
            $_SESSION['loggedUser'] = $loggedUser;
            $controller->read($loggedUser);
            
        }
    }

    public function logout()
    {
        unset($_SESSION['loggedUser']);
        header('Location: ../products/read');
    }
}