<?php

class GoldenEditionBook extends Book
{
    function __construct($title, $author, $price)
    {
        parent::__construct($title, $author, $price);
    }

    protected function getPrice()
    {
        return parent::getPrice() * 1.3;
    }

}