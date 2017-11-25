<?php

class Car
{
    public $model;
    public $speed;

    function __construct(string $model, int $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    function __toString()
    {
        return "{$this->model} {$this->speed}\n";
    }
}