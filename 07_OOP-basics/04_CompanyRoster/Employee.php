<?php

class Employee
{
    public $name;
    public $salary;
    public $position;
    public $department;
    public $email;
    public $age;

    function __construct(string $name, float $salary, string $position, string $department,
                         string $email = "n/a", int $age = -1)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->department = $department;
        $this->position = $position;
        $this->email = $email;
        $this->age = $age;
    }
}