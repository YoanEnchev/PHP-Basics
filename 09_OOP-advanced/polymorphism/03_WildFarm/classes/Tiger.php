<?php

class Tiger extends Felime implements IAnimal
{

    public function __construct($name, $weight, $region)
    {
        parent::__construct($name, $weight, $region);
        $this->type = "Tiger";
    }

    public function makeSound(): void
    {
        echo "ROAAR!!!\n";
    }

    public function eat(Food $food): void
    {
        $this->makeSound();
        $className = get_class($food);

        if ($className != "Meat") {
            echo "Tigers are not eating that type of food!\n";
        }
        $this->foodEaten += $food->getQuantity();
    }
}