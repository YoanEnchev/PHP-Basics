<?php

class Cargo
{
    public $weight;
    public $type;

    function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }
}