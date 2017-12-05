<?php

abstract class Vehicle
{
    protected $fuel;
    protected $litersPerKm;
    protected $travelledKilometers;
    protected $tankCapacity;

    public function __construct(float $fuel, float $liitersPerKm, float $capacity)
    {
        $this->tankCapacity = $capacity;
        $this->setFuel($fuel);
        $this->litersPerKm = $liitersPerKm;
        $this->travelledKilometers = 0;
    }

    public function getFuel()
    {
        return $this->fuel;
    }

    public function fuelValidation(float $fuelToAdd): bool
    {

        if($fuelToAdd < 0) {
            echo "Fuel must be a positive number\n";
            return false;
        }

        else if ($fuelToAdd > $this->tankCapacity) {
            echo "Cannot fit fuel in tank\n";
            return false;
        }

        else {
            return true;
        }
    }

    public function setFuel(float $fuel)
    {
        $isValid = $this->fuelValidation($fuel);

        if($isValid) { //valid
            $this->fuel = $fuel;
        }
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