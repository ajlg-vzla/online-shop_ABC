<?php

class UsersC extends MainC
{
    public function __construct()
    {
        $this->userModel = $this->model('UserM');
    }

    public function create()
    {
        $this->view('users/create');
    }

    public function saveCreate()
    {
        $user =
        [
            'name' => $_REQUEST['name'],
            'password' => $_REQUEST['password'],
        ];
        $this->userModel->createUser($user);
        header('Location: ../products/read');
    }
}