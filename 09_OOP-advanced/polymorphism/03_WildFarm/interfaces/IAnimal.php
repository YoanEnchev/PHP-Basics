<?php

interface IAnimal
{
    public function makeSound() : void;
    public function eat(Food $food) : void;
}