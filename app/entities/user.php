<?php

//  user entity to handle the information related to the current session user
class User
{
    public $id;
    public $name;
    public $password;
    public $balance;

    public function __construct(int $id, string $name, string $password, float $balance)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->balance = $balance;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }
}