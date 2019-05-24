<?php

class ProductsC extends MainC
{
    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }

    public function create()
    {
        $this->view('products/create');
    }

    public function saveCreate()
    {
        $product =
        [
            'name' => $_REQUEST['name'],
            'price' => $_REQUEST['price'],
            'rating' => $_REQUEST['rating']
        ];
        $this->productModel->createProduct($product);
        header('Location: read');
    }

    public function read()
    {
        $products = $this->productModel->readProducts();
        $parameters = 
        [
            'products' => $products
        ];
        $this->view('products/read', $parameters);
    }

    public function update($id)
    {
        $parameters =
        [
            'id' => $id
        ];
        $this->view('products/update', $parameters);
    }

    public function saveUpdate()
    {
        $product =
        [
            'id' => $_REQUEST['id'],
            'name' => $_REQUEST['name'],
            'price' => $_REQUEST['price'],
            'rating' => $_REQUEST['rating']
        ];
        $this->productModel->updateProduct($product);
        $this->read();
    }

    public function delete($id)
    {
        $parameters =
        [
            'id' => $id
        ];
        $this->view('products/delete', $parameters);
    }

    public function saveDelete()
    {
        $product =
        [
            'id' => $_REQUEST['id']
        ];
        $this->productModel->deleteProduct($product);
        $this->read();
    }
}