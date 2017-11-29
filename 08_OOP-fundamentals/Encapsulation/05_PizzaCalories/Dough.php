<?php

class Dough
{
    private $flourType;
    private $bakingTechnique;
    private $weight;

    public function __construct(string $flourType, string $technique, float $weight)
    {
        $this->setFlourType(strtolower($flourType));
        $this->setBakingTechnique(strtolower($technique));
        $this->setWeight($weight);
    }

    public function calcCalories()
    {
        $base = 2 * $this->weight;

        switch ($this->flourType) {
            case 'white':
                $modifier_flourType = 1.5;
                break;
            case 'wholegrain':
                $modifier_flourType = 1;
                break;
        }

        switch ($this->bakingTechnique) {
            case 'crispy':
                $modifier_technique = 0.9;
                break;
            case 'chewy':
                $modifier_technique = 1.1;
                break;
            case 'homemade':
                $modifier_technique = 1;
                break;
        }

        return $base * $modifier_flourType * $modifier_technique;
    }

    public function getFlourType()
    {
        return $this->flourType;
    }

    public function setFlourType($flourType)
    {
        if($flourType != "white" && $flourType != "wholegrain") {
            throw new Exception("Invalid type of dough");
        }

        $this->flourType = $flourType;
    }

    public function getBakingTechnique()
    {
        return $this->bakingTechnique;
    }

    public function setBakingTechnique($bakingTechnique)
    {
        $this->bakingTechnique = $bakingTechnique;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        if($weight < 1 || $weight > 200) {
            throw new Exception("Dough weight should be in the range [1..200].");
        }

        $this->weight = $weight;
    }
}