<?php

class Animal
{
    protected $name;
    protected $age;
    protected $gender;

    public function __construct(string $name, int $age, string $gender)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);
    }

    public function produceSound()
    {
        echo "Not implemented\n";
    }

    protected function getName()
    {
        return $this->name;
    }

    protected function setName($name)
    {
        $this->name = $name;
    }

    protected function getAge()
    {
        return $this->age;
    }

    protected function setAge($age)
    {
        if($age < 0) {
            throw new Error("Invalid input!");
        }

        $this->age = $age;
    }

    protected function getGender()
    {
        return $this->gender;
    }

    protected function setGender($gender)
    {
        $this->gender = $gender;
    }
}