<?php

class Pokemon
{
    public $name;
    public $type;

    function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    function __toString()
    {
       return "{$this->name} {$this->type}\n";
    }
}