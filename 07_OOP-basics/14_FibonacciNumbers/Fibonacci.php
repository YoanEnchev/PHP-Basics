<?php

class Fibonacci
{
    public $numbers;

    function __construct()
    {
        $this->numbers = [0, 1];

        for ($i = 2; $i <= 30; $i++) {
            $this->numbers[$i] =  $this->numbers[$i - 1] + $this->numbers[$i - 2];
        }
    }

    function printNumbersBetweenIndexes($min, $max) {
        $result = [];

        for ($i = $min; $i < $max; $i++) {
            array_push($result, $this->numbers[$i]);
        }

        echo join(', ', $result);

    }
}