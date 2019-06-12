<?php

class Rating
{
    public $idUser;
    public $idProduct;
    public $thumbsUp;
    public $thumbsDown;
    public $average;

    public function __construct(int $idUser, int $idProduct, int $thumbsUp, int $thumbsDown, int $average)
    {
        $this->idUser = $idUser;
        $this->idProduct = $idProduct;
        $this->thumbsUp = $thumbsUp;
        $this->thumbsDown = $thumbsDown;
        $this->average = $average;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getIdProduct()
    {
        return $this->idProduct;
    }

    public function getThumbsUp()
    {
        return $this->thumbsUp;
    }

    public function getThumbsDown()
    {
        return $this->thumbsDown;
    }

    public function getAverage()
    {
        return $this->average;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
    }

    public function setThumbsUp($thumbsUp)
    {
        $this->thumbsUp = $thumbsUp;
    }

    public function setThumbsDown($thumbsDown)
    {
        $this->thumbsDown = $thumbsDown;
    }

    public function setAverage($average)
    {
        $this->average = $average;
    }
}