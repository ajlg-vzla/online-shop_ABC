<?php

class Log
{
    public function __construct()
    {
        $this->db = new Connection;
    }

    public function tryLogin($credentials)
    {
        $username = $credentials['name'];
        $password = $credentials['password'];
        $this->db->query("SELECT * FROM users WHERE name='$username' AND password='$password'");
        return $this->db->results();
    }
    
}