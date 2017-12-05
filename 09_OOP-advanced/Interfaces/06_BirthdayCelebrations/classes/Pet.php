<?php

class Pet implements IBirthday
{
    private $birthday;
    private $name;

    public function __construct(string $name, string $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getName()
    {
        return $this->name;
    }
}