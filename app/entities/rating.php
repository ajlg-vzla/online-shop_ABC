<?php

class Rating
{
    public $idUser;
    public $idProduct;

    public function __construct(int $idUser, int $idProduct, int $rating, int $timesRated)
    {
        $this->idUser = $idUser;
        $this->idProduct = $idProduct;
        $this->rating = $rating;
        $this->timesRated = $timesRated;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getIdProduct()
    {
        return $this->idProduct;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getTimesRated()
    {
        return $this->timesRated;
    }
    
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function setTimesRated($timesRated)
    {
        $this->timesRated = $timesRated;
    }
}