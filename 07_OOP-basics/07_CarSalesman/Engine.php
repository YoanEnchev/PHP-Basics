<?php

class Engine
{
    public $model;
    public $power;
    public $displacement;
    public $efficiency;

    function __construct(string $model, int $power, int $displacement = 0, string $efficiency = "n/a")
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }
}