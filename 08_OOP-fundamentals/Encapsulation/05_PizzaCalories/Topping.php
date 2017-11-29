<?php

class Topping
{
    private $type;
    private $weight;

    public function __construct(string $type, float $weight)
    {
        $this->setType(strtolower($type));
        $this->setWeight($weight);
    }

    public function calcCalories()
    {
        switch ($this->type) {
            case 'meat':
                $modifier = 1.2;
                break;
            case 'veggies':
                $modifier = 0.8;
                break;
            case 'cheese':
                $modifier = 1.1;
                break;
            case 'sauce':
                $modifier = 0.9;
                break;
        }

        return 2 * $this->weight * $modifier;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        if ($type != "meat" && $type != "veggies" && $type != "cheese" && $type != "sauce") {
            throw new Exception("Cannot place {$type} on top of your pizza.");
        }

        $this->type = $type;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        if ($weight < 1 || $weight > 50) {
            throw new Exception("{$this->type} weight should be in the range [1..50].");
        }

        $this->weight = $weight;
    }
}