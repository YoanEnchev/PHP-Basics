<?php

class Person
{
    public $company;
    public $pokemon;
    public $parents;
    public $children;
    public $car;

    function __construct()
    {
        $this->company="";
        $this->pokemon = [];
        $this->parents = [];
        $this->children = [];
        $this->car = "";
    }
}