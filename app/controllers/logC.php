<?php

//  log controller
class LogC extends MainC
{
    //  set log model
    public function __construct()
    {
        $this->logModel = $this->model('log');
    }

    //  set log view, it starts on the login
    public function login()
    {
        $this->view('log/login');
    }

    //  receive the data given by the user and try to do a login
    //  only place in the whole project where superglobals and are used
    //  and it sets a session variable with a user object
    //  (most likely to change, just havent found an alternative jet)
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
            $loggedUser = new User($user[0]->id, $user[0]->name, "null", $user[0]->balance);
            $_SESSION['loggedUser'] = $loggedUser;
            $controller = new productsC;
            $controller->read();
            
        }
    }

    //  when the user has logout of the shop
    //  it could have a view and more tasks
    //  in the future
    public function logout()
    {
        unset($_SESSION['loggedUser']);
        header('Location: ../products/read');
    }
}