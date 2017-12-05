<?php

class Bus extends Vehicle implements IDrive
{
    private $isEmpty;

    public function __construct(float $fuel, float $liitersPerKm, float $capacity)
    {
        parent::__construct($fuel, $liitersPerKm, $capacity);
        $this->isEmpty = false;
    }

    public function drive(float $distance): void
    {
        if ($this->isEmpty) {
            $consumation = $distance * $this->litersPerKm;
        } else { //working air-conditioner
            $consumation = $distance * ($this->litersPerKm + 1.4);
        }

        if ($consumation > $this->fuel) {
            echo "Bus needs refueling\n";
        } else {
            $this->travelledKilometers += $distance;
            $this->fuel -= $consumation;

            echo "Bus travelled $distance km\n";
        }
    }

    public function refuel(float $liters): void
    {
        $isValid = $this->fuelValidation($liters);

        if ($isValid) {
            $this->fuel += $liters;
        }
    }

    public function setIsEmpty(bool $value)
    {
        $this->isEmpty = $value;
    }
}