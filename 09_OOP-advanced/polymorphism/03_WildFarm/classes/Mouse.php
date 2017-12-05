<?php

class Mouse extends Mammal implements IAnimal
{
    public function __construct($name, $weight, $region)
    {
        parent::__construct($name, $weight, $region);
        $this->type = "Mouse";
    }

    public function makeSound(): void
    {
        echo "SQUEEEAAAK!\n";
    }

    public function eat(Food $food): void
    {
        $this->makeSound();
        $this->foodEaten += $food->getQuantity();
    }
}