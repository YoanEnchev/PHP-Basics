<?php

class Person
{
    protected $name;
    protected $age;

    function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    protected function getName()
    {
        return $this->name;
    }

    protected function getAge()
    {
        return $this->age;
    }

    protected function setName(string $name)
    {
        if(strlen($name) < 3) {
            throw new Exception("Name’s length should not be less than 3 symbols!");
        }

        $this->name = $name;
    }

    protected function setAge(int $age)
    {
        if ($age < 1) {
            throw new Exception("Age must be positive!");
        }

        $this->age = $age;
    }
}