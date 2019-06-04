<?php

class UserM
{
    public function __construct()
    {
        $this->db = new Connection;
    }

    public function createUser($user)
    {
        $name   = $user['name'];
        $password  = $user['password'];
        $this->db->query("INSERT INTO users(name, password) VALUES ('$name', $password)");
        return $this->db->countRows();
    }
}