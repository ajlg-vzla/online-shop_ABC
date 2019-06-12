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
        ];
        $this->productModel->createProduct($product);
        $this->productModel->createProductRating();
        header('Location: read');
    }

    public function read()
    {
        $products = $this->productModel->read();
        $parameters = 
        [
            'products' => $products
        ];
        if(!empty($_SESSION['loggedUser']))
        {
            $ratingsResults = $this->productModel->findRatings($_SESSION['loggedUser']->id);
            $ratings = [];
            $i=0;
            foreach($ratingsResults as $result) {
                $ratings[$i] = new Rating($result->idUser, $result->idProduct, $result->thumbsUp, $result->thumbsDown, $result->average);
                $i++;
            }
            $parameters = 
            [
                'products' => $products,
                'user' => $_SESSION['loggedUser'],
                'ratings' => $ratings
            ];
        }
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
            'price' => $_REQUEST['price']
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


    public function thumbsUp($id)
    {
        $this->productModel->thumbsUp($id);
        $this->productModel->registerUserThumbs($id, $_SESSION['loggedUser']->id);
        $this->read();
    }

    public function thumbsDown($id)
    {
        $this->productModel->thumbsDown($id);
        $this->productModel->registerUserThumbs($id, $_SESSION['loggedUser']->id);
        $this->read();
    }

}