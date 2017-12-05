<?php
/**
 * Created by PhpStorm.
 * User: joanb
 * Date: 11/30/2017
 * Time: 8:44 AM
 */

class Truck extends Vehicle implements IDrive
{
    public function __construct(float $fuel, float $liitersPerKm, float $capacity)
    {
        parent::__construct($fuel, $liitersPerKm, $capacity);
    }

    public function drive(float $distance): void
    {
        $consumation = $distance * ($this->litersPerKm + 1.6);

        if($consumation > $this->fuel) {
            echo "Truck needs refueling\n";
        }

        else {
            $this->travelledKilometers += $distance;
            $this->fuel -= $consumation;

            echo "Truck travelled $distance km\n";
        }
    }

    public function refuel(float $liters): void
    {
        $isValid = $this->fuelValidation($liters);

        if($isValid) {
            $this->fuel += $liters * 95 / 100;
        }
    }
}