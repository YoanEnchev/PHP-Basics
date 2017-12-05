<?php

class Citizen implements IDefined, IBirthday
{
    private $id;
    private $name;
    private $age;
    private $birthday;

    public function __construct(string $id, string $name, int $age, string $birthday)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->birthday = $birthday;
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

    public function getBirthday()
    {
        return $this->birthday;
    }
}