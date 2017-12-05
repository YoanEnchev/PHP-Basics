<?php

class Car extends Vehicle implements IDrive
{
    public function __construct(float $fuel, float $liitersPerKm, float $capacity)
    {
        parent::__construct($fuel, $liitersPerKm, $capacity);
    }

    public function drive(float $distance): void
    {
        $consumation = $distance * ($this->litersPerKm + 0.9);

        if ($consumation > $this->fuel) {
            echo "Car needs refueling\n";
        }
        else {
            $this->travelledKilometers += $distance;
            $this->fuel -= $consumation;

            echo "Car travelled $distance km\n";
        }
    }

    public function refuel(float $liters): void
    {
        $isValid = $this->fuelValidation($liters);

        if($isValid) {
            $this->fuel += $liters;
        }
    }
}