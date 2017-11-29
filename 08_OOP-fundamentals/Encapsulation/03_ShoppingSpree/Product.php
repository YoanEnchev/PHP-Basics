<?php

class Product
{
    private $name;
    private $cost;

    public function __construct(string $name, float $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        if($name == "") {
            throw new Exception("Name cannot be empty");
        }

        $this->name = $name;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost(float $cost)
    {
        if($cost < 0) {
            throw new Exception("Money cannot be negative");
        }

        $this->cost = $cost;
    }
}