<?php

class Citizen implements IDefined, IBirthday, IBuyer
{
    private $id;
    private $name;
    private $age;
    private $birthday;
    private $food;

    public function __construct(string $id, string $name, int $age, string $birthday)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->birthday = $birthday;
        $this->food = 0;
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

    public function getFood(): int
    {
        return $this->food;
    }

    public function buyFood()
    {
        $this->food += 10;
    }
}