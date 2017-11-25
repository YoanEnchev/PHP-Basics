<?php

class Car
{
    public $model;
    public $fuelAmount;
    public $fuelCostPerKm;
    public $distanceTravelled;

    function __construct(string $model, float $fuelAmount, float $fuelCostPerKm)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCostPerKm = $fuelCostPerKm;
        $this->distanceTravelled = 0;
    }
}