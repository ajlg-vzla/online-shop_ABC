<?php

class ShoppingCart
{
    public $idUser;
    public $idProducts = [];
    public $shippingOpt;

    public function __construct(int $idUser, array $idProducts, int $shippingOpt)
    {
        $this->idUser = $idUser;
        $this->products = $products;
        $this->shippingOpt = $shippingOpt;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getShippingOpt()
    {
        return $this->shippingOpt;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setProducts($products)
    {
        $this->products = $products;
    }

    public function setShippingOpt($shippingOpt)
    {
        $this->shippingOpt = $shippingOpt;
    }
}