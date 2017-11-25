<?php

class Car
{
    public $model;
    public $engine;
    public $tires;
    public $cargo;

    function __construct(string $model, Engine $engine, Cargo $cargo, array $tireList)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tires = $tireList;
    }
}