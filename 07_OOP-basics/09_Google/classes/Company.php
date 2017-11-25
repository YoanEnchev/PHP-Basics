<?php

class Company
{
    public $name;
    public $department;
    public $salary;

    function __construct(string $name, string $department, float $salary)
    {
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
    }

    function __toString()
    {
        $salary = number_format((float)$this->salary, 2, '.', '');
        return "{$this->name} {$this->department} $salary\n";
    }
}