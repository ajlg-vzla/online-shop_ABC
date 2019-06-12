<?php

class ShoppingCartC extends MainC
{
    public function __construct()
    {
        $this->shoppingCartModel = $this->model('ShoppingCart');
    }

    public function create($productId)
    {
        $shoppingCart = $this->shoppingCartModel->create($productId);
        $parameters = 
        [
            'product' => $shoppingCart
        ];
        $this->view('shoppingCart/create', $parameters);
    }

    public function saveCreate()
    {
        $product =
        [

            'idUser' => $_SESSION['loggedUser']->id,
            'idProduct' => $_REQUEST['id'],
            'units' => $_REQUEST['units']
        ];
        $this->shoppingCartModel->saveCreate($product);
        header('Location: read');
    }

    public function read()
    {
        $shoppingCart = $this->shoppingCartModel->read();
        $parameters = 
        [
            'products' => $shoppingCart
        ];
        $this->view('shoppingCart/read', $parameters);
    }

    public function delete($id)
    {
        $this->shoppingCartModel->delete($id);
        $this->read();
    }

    public function pay()
    {
        $newBalance = $_SESSION['loggedUser']->balance - $_REQUEST['grandTotal'];
        $user =
        [
            'id' => $_SESSION['loggedUser']->id,
            'balance' => $newBalance,
        ];
        $this->shoppingCartModel->pay($user);
        $this->shoppingCartModel->clear($user['id']);
        $_SESSION['loggedUser']->balance = $newBalance;
        $this->read();
    }
}