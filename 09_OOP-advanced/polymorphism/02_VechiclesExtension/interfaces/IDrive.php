<?php

interface IDrive
{
   public function drive(float $distance) : void;
   public function refuel(float $liters) : void;
}