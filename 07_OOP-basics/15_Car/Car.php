<?php

class Car
{
    public $speed;
    public $fuel;
    public $fuelEconomy;
    public $travelledDistance;
    public $travelledTime;

    public function __construct(int $speed, int $fuel, int $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
        $this->travelledDistance = 0;
        $this->travelledTime = 0;
    }

    public function travel(int $distance)
    {
        $fuelCost = $distance * $this->fuelEconomy / 100;

        if ($fuelCost > $this->fuel) { //not enough fuel, travel as much as you can
            $travelledDistance = 1 / $this->fuelEconomy * $this->fuel;
            $neededTime = $travelledDistance / $this->speed;
            $this->fuel = 0;
        } else { //enough fuel
            $travelledDistance = $distance;
            $neededTime = $distance / $this->speed;
        }

        $this->fuel -= $fuelCost;
        $this->travelledTime += $neededTime;
        $this->travelledDistance += $travelledDistance;
    }

    public function refuel(int $quantity)
    {
        $this->fuel += $quantity;
    }

    public function printTravelledDistance()
    {
        echo "Total Distance: {$this->travelledDistance} kilometers\n";
    }

    public function printTravelledTime()
    {
        $hours = intval($this->travelledTime);
        $minutes = intval(($this->travelledTime - $hours) * 60);
        echo "Total Time: {$hours} hours and {$minutes} minutes \n";
    }

    public function printLeftFuel()
    {
        echo "Fuel left: {$this->fuel} liters\n";
    }

}