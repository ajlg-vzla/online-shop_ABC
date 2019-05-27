<?php

class ShoppingCart
{
    private $db;

    public function __construct()
    {
        $this->db = new Connection;
    }

    public function read()
    {
        $this->db->query("SELECT * FROM shoppingCart, products WHERE shoppingCart.idUser=".$_SESSION['loggedUser']->id." && shoppingCart.idProduct=products.id");
        return $this->db->results();
    }

    public function create($productId)
    {
        $this->db->query("SELECT * FROM products WHERE id=".$productId);
        return $this->db->results();
        //$this->view('shoppingCart/create');
    }

    public function saveCreate($product)
    {
        $idProduct = $product['idProduct'];
        $idUser = $product['idUser'];
        $units = $product['units'];
        $this->db->query("INSERT INTO shoppingCart(idProduct, idUser, units) VALUES ($idProduct, $idUser, $units)");
        return $this->db->countRows();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM shoppingCart WHERE idProduct = $id");
        return $this->db->countRows();
    }
}