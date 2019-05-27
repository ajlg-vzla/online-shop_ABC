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
        $rating = $product['rating'];
        $this->db->query("INSERT INTO products(name, price, rating) VALUES ('$name', $price, $rating)");
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
        $this->db->query("DELETE FROM products WHERE products.id = $id");
        return $this->db->countRows();
    }
}