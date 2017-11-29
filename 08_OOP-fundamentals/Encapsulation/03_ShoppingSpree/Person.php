<?php

class Person
{
    private $name;
    private $money;
    private $bagOfProducts;

    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->bagOfProducts = [];
    }

    public function getBagOfProducts()
    {
        return $this->bagOfProducts;
    }

    public function addToBag(string $productName)
    {
        array_push($this->bagOfProducts, $productName);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function setMoney($money)
    {
        if($money < 0) {
            throw new Exception("Money cannot be negative");
        }

        $this->money = $money;
    }
}