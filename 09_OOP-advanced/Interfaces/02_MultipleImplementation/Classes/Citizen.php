<?php

class Citizen implements IPerson, IBirthable, IDentifiable
{
    private $name;
    private $age;
    private $birthdate;
    private $id;

    public function __construct(string $id, string $name, int $age, string $birthdate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->birthdate = $birthdate;
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

    public function getBirthdate()
    {
        return $this->birthdate;
    }
}