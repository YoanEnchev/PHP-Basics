<?php

class Vegetable extends Food
{
    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }
}