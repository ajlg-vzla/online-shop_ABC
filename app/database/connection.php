<?php

class Connection 
{
    private $host =     HOST;
    private $user =     USER;
    private $password = PASSWORD;
    private $name =     NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        // Connection configuration
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
        $options = array
        (
            PDO::ATTR_PERSISTENT => true, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        //  Creating an instance with PDO
        try
        {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        }
        catch(PDOException $e)
        {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($parameter, $value, $type=null)
    {
        if(is_null($type))
        {
            switch(true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_STR;
                break;
            }
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function results()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function result()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function countRows()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }
}