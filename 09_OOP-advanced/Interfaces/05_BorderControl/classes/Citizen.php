<?php

class Citizen implements IDefined
{
    private $id;
    private $name;
    private $age;

    public function __construct(string $id, string $name, int $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
}