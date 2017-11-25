<?php

class Person
{
    public $name;

    function saysHello() {
        return "{$this->name} says \"Hello\"!";
    }

    function __construct(string $name)
    {
        $this->name = $name;
    }
}