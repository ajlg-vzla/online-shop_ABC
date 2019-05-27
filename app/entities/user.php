<?php

class user
{
    public $id;
    public $name;
    public $balance;

    public function __construct(int $id, string $name, float $balance)
    {
        $this->id = $id;
        $this->name = $name;
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

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }
}