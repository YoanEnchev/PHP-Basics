<?php

class Repair implements IRepair
{
    private $name;
    private $hoursWorked;

    public function getPartName()
    {
        return $this->name;
    }

    public function getHoursWorked(): int
    {
        return $this->hoursWorked;
    }
}