<?php

class StreetExtraordinaire extends Cat
{
    protected $decibelsOfMeows;

    public function __construct(string $name, int $decibelsOfMeows)
    {
        parent::__construct($name);
        $this->setDecibelsOfMeows($decibelsOfMeows);
    }

    public function __toString()
    {
        $name = parent::__toString();
        return "StreetExtraordinaire {$name} {$this->getDecibelsOfMeows()}\n";
    }

    public function getDecibelsOfMeows()
    {
        return $this->decibelsOfMeows;
    }

    public function setDecibelsOfMeows(int $decibelsOfMeows)
    {
        $this->decibelsOfMeows = $decibelsOfMeows;
    }
}