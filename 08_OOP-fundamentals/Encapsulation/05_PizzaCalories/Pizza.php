<?php

class Pizza
{
    private $name;
    private $dough;
    private $toppings;
    private $toppingsCount;

    public function __construct(string $name, int $toppingsCount)
    {
        $this->setName($name);
        $this->toppings = [];
        $this->setToppingsCount($toppingsCount);
    }

    public function __toString()
    {
        $calories = number_format($this->calcCalories(), 2, '.', '');
        return "{$this->name} - {$calories} Calories.";
    }

    public function calcCalories()
    {
        $dough_calories = $this->dough->calcCalories();
        $toppings_calories = 0;

        foreach ($this->toppings as $topping) {
            $caloriesForTopping = $topping->calcCalories();
            $toppings_calories += $caloriesForTopping;
        }

        return $dough_calories + $toppings_calories;
    }

    public function addTopping(Topping $topping)
    {
        array_push($this->toppings, $topping);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if($name == "" || strlen($name) > 15) {
            throw new Exception("Pizza name should be between 1 and 15 symbols.");
        }

        $this->name = $name;
    }

    public function getDough()
    {
        return $this->dough;
    }

    public function setDough($dough)
    {
        $this->dough = $dough;
    }

    public function getToppingsCount()
    {
        return $this->toppingsCount;
    }

    public function setToppingsCount($toppingsCount)
    {
        if($toppingsCount < 0 || $toppingsCount > 10) {
            throw new Exception("Number of toppings should be in range [0..10].");
        }

        $this->toppingsCount = $toppingsCount;
    }

}