<?php

abstract class Vehicle
{
    protected $fuel;
    protected $litersPerKm;
    protected $travelledKilometers;

    public function __construct(float $fuel, float $liitersPerKm)
    {
        $this->fuel = $fuel;
        $this->litersPerKm = $liitersPerKm;
        $this->travelledKilometers = 0;
    }

    public function getFuel()
    {
        return $this->fuel;
    }

    public function getLitersPerKm()
    {
        return $this->litersPerKm;
    }

    public function getTravelledKilometers()
    {
        return $this->travelledKilometers;
    }
}