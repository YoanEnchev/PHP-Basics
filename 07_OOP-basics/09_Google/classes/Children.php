<?php

class Children
{
    public $name;
    public $birthday;

    function __construct(string $name, string $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    function __toString()
    {
        return "{$this->name} {$this->birthday}\n";
    }
}