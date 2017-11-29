<?php

class Cat
{
    private $name;

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}