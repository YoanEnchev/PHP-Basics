<?php

class Zebra extends Mammal implements IAnimal
{
    public function __construct($name, $weight, $region)
    {
        parent::__construct($name, $weight, $region);
        $this->type = "Zebra";
    }

    public function makeSound(): void
    {
        echo "Zs\n";
    }

    public function eat(Food $food): void
    {
        $this->makeSound();
        $className = get_class($food);

        if ($className == "Meat") {
            echo "Zebras are not eating that type of food!\n";
        }
        $this->foodEaten += $food->getQuantity();
    }
}