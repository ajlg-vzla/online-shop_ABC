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
        $this->db->query("SELECT * FROM shoppingcart, products WHERE shoppingcart.idUser=".$_SESSION['loggedUser']->id." && shoppingcart.idProduct=products.id");
        return $this->db->results();
    }

    public function create($productId)
    {
        $this->db->query("SELECT * FROM products WHERE id=".$productId);
        return $this->db->results();
        //$this->view('shoppingcart/create');
    }

    public function saveCreate($product)
    {
        $idProduct = $product['idProduct'];
        $idUser = $product['idUser'];
        $units = $product['units'];
        $this->db->query("INSERT INTO shoppingcart(idProduct, idUser, units) VALUES ($idProduct, $idUser, $units)");
        return $this->db->countRows();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM shoppingcart WHERE idProduct = $id");
        return $this->db->countRows();
    }

    public function pay($user)
    {
        $id = $user['id'];
        $balance = $user['balance'];
        $this->db->query("UPDATE users SET users.balance = '$balance' WHERE users.id = $id");
        return $this->db->countRows();
    }

    public function clear($id)
    {
        $this->db->query("DELETE FROM shoppingcart WHERE idUser = $id");
        return $this->db->countRows();
    }
}