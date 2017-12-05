<?php

abstract class Food
{
    protected $quantity;

    public function getQuantity()
    {
       return $this->quantity;
    }
}