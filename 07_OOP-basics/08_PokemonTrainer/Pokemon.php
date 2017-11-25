<?php

class Pokemon
{
    public $name;
    public $element;
    public $health;

    function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }
}