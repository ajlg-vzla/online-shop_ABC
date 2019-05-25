<?php

class user
{
    public $name;
    public $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBalance()
    {
        return $this->balance;
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