<?php

//  products controller
class ProductsC extends MainC
{
    //  set products model
    public function __construct()
    {
        $this->productModel = $this->model('ProductM');
    }

    //  retrieve from model and load to view all products
    public function read()
    {
        //  load al products
        $productsResult = $this->productModel->read();
        $i=0;
        $ratings = [];
        foreach($productsResult as $result)
        {
            $products[$i] = new Product($result->id, $result->name, $result->price, $result->measure_unit, $result->rating);
            $i++;
        }

        //  verify if theres a logged user on the shop to load all ratings
        if(!empty($_SESSION['loggedUser']))
        {
            //  load all ratings
            $ratingsResults = $this->productModel->findRatings($_SESSION['loggedUser']->id);
            $ratings = [];
            foreach($ratingsResults as $result)
            {
                $ratings[$i] = new Rating($result->idUser, $result->idProduct, $result->rating, $result->timesRated);
                $i++;
            }
            $parameters = 
            [
                'products' => $products,
                'ratings' => $ratings
            ];
        }
        else
        {
            //  if theres no user logged in, it wont show ratings (most likely to change)
            $parameters = 
            [
                'products' => $products
            ];
        }
        $this->view('products/read', $parameters);
    }

}