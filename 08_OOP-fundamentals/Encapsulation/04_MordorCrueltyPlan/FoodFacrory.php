<?php

class FoodFacrory
{
    private $foodList;

    public function getFoodList(): array
    {
        return $this->foodList;
    }

    function __construct()
    {
        $this->foodList = [];
    }

    public function addFood($foodName)
    {
        array_push($this->foodList, strtolower($foodName));
    }
}