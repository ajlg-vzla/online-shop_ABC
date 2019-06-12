<?php

//  user entity to handle the information related to the products on the shop
class Product
{
    public $id;
    public $name;
    public $price;
    public $measureUnit;
    public $rating;

    public function __construct(int $id, string $name, float $price, string $measureUnit, int $rating)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->measureUnit = $measureUnit;
        $this->rating = $rating;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
    
    public function getMeasureUnit()
    {
        return $this->measureUnit;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setMeasureUnit($measureUnit)
    {
        $this->measureUnit = $measureUnit;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}