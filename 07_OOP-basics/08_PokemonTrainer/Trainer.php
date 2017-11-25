<?php

class Trainer
{
    public $name;
    public $badges;
    public $pokemon;

    function __construct(string $name)
    {
        $this->name = $name;
        $this->badges = 0;
        $this->pokemon = [];
    }
}