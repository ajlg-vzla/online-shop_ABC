<?php

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Connection;
    }

    public function createProduct($product)
    {
        $name   = $product['name'];
        $price  = $product['price'];
        $this->db->query("INSERT INTO products(name, price) VALUES ('$name', $price)");
        return $this->db->countRows();
    }

    public function createProductRating()
    {
        $this->db->query("INSERT INTO ratings_products(idProduct) VALUES (LAST_INSERT_ID())");
        return $this->db->countRows();
    }
    

    public function read()
    {
        $this->db->query("SELECT * FROM products");
        return $this->db->results();
    }
    
    public function updateProduct($product)
    {
        $id     = $product['id'];
        $name   = $product['name'];
        $price  = $product['price'];
        $rating = $product['rating'];
        $this->db->query("UPDATE products SET name = '$name', price = $price, rating = $rating WHERE products.id = $id");
        return $this->db->countRows();
    }

    public function deleteProduct($product)
    {
        $id     = $product['id'];
        $this->db->query("DELETE FROM products, ratings_users_products, ratings_products WHERE products.id = $id AND ratings_users_products.idProduct = $id AND ratings_products.idProduct = $id");
        return $this->db->countRows();
    }

    public function thumbsUp($id)
    {
        $this->db->query("UPDATE ratings_products SET thumbsUp = thumbsUp+1, average = (thumbsUp*5)/(thumbsUp+thumbsDown) WHERE idProduct = $id");
        return $this->db->countRows();
    }

    public function thumbsDown($id)
    {
        $this->db->query("UPDATE ratings_products SET thumbsDown = thumbsDown+1, average = (thumbsUp*5)/(thumbsUp+thumbsDown) WHERE idProduct = $id");
        return $this->db->countRows();
    }

    public function registerUserThumbs($productId, $userId)
    {
        $this->db->query("INSERT INTO ratings_users_products(idUser, idProduct) VALUES ($userId, $productId)");
        return $this->db->countRows();
    }

    public function findRatings($id)
    {
        $this->db->query("SELECT * FROM ratings_users_products, ratings_products WHERE ratings_users_products.idUser=$id AND ratings_users_products.idProduct=ratings_products.idProduct");
        return $this->db->results();
    }

}