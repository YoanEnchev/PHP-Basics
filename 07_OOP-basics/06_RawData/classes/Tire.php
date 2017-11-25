<?php

class Tire
{
    public $pressure;
    public $age;

    function __construct(float $tirePressure, int $tireAge)
    {
        $this->pressure = $tirePressure;
        $this->age = $tireAge;
    }
}