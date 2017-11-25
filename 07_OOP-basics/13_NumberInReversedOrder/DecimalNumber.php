<?php

class DecimalNumber
{
    public $value;

    function __construct(float $number)
    {
        $this->value = $number;
    }

    function printReversed()
    {
        $numAsString = (string)$this->value;
        echo strrev($numAsString);
    }
}