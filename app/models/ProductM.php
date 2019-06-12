<?php

class ProductM
{
    private $db;

    public function __construct()
    {
        $this->db = new Connection;
    }

    public function read()
    {
        $this->db->query("SELECT * FROM products");
        return $this->db->results();
    }

    public function findRatings($id)
    {
        $this->db->query("SELECT * FROM ratings_users_products, ratings_products WHERE ratings_users_products.idUser=$id AND ratings_users_products.idProduct=ratings_products.idProduct");
        return $this->db->results();
    }

}