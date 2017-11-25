<?php

class Car
{
    public $model;
    public $engine;
    public $weight;
    public $color;

    function __construct(string $model, Engine $engine, int $weight = 0, string $color = "n/a")
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }
}