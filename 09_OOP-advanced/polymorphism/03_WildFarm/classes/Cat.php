<?php

class Cat extends Felime implements IAnimal, ICat
{
    private $breed;

    public function __construct(string $name, float $weight, string $region, string $catBreed)
    {
        parent::__construct($name, $weight, $region);
        $this->breed = $catBreed;
        $this->type = 'Cat';
    }

    public function getBreed() : string
    {
        return $this->breed;
    }

    public function makeSound(): void
    {
        echo "Meowwww\n";
    }

    public function eat(Food $food): void
    {
        $this->makeSound();
        $this->foodEaten += $food->getQuantity();
    }

    public function __toString()
    {
        return "{$this->type}[$this->name, $this->breed, $this->foodEaten, $this->livingRegion, $this->weight]\n";
    }
}