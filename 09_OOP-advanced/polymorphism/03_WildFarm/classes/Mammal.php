<?php

abstract class Mammal extends Animal implements IAnimal
{
    protected $livingRegion;

    public function __construct(string $name, float $weight, string $region)
    {
        parent::__construct( $name, $weight);
        $this->livingRegion = $region;
    }

    public function __toString()
    {
        return "{$this->type}[$this->name, $this->weight, $this->livingRegion, $this->foodEaten]\n";
    }
}