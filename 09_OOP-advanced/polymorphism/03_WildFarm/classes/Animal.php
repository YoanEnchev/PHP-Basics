<?php

abstract class Animal
{
    protected $name;
    protected $type;
    protected $weight;
    protected $foodEaten;

    public function __construct(string $name, float $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->foodEaten = 0;
    }

    public function __toString()
    {
        return "{$this->type}[$this->name, $this->foodEaten, $this->weight]\n";
    }
}