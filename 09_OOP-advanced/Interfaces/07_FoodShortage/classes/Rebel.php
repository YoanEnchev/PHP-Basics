<?php

class Rebel implements IBuyer
{
    private $name;
    private $age;
    private $group;
    private $food;

    public function __construct(string $name, int $age, string $group)
    {
        $this->name = $name;
        $this->age = $age;
        $this->group = $group;
        $this->food = 0;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function getFood(): int
    {
        return $this->food;
    }

    public function buyFood()
    {
        $this->food += 5;
    }
}