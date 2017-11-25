<?php

class Person
{
    public $name;
    public $age;

    function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function __toString()
    {
        return "{$this->name} {$this->age}";
    }
}