<?php

class People
{
    public $name;
    public $age;
    public $occupation;

    function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    function __toString()
    {
        return "{$this->name} - age: {$this->age}, occupation: {$this->occupation}\n";
    }
}