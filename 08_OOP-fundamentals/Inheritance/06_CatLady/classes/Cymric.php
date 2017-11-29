<?php

class Cymric extends Cat
{
    protected $furLength;

    function __construct(string $name, int $furLength)
    {
        parent::__construct($name);
        $this->setFurLength($furLength);
    }

    public function __toString()
    {
        $name = parent::__toString();
        return "Cymric {$name} {$this->getFurLength()}\n";
    }

    public function getFurLength()
    {
        return $this->furLength;
    }

    public function setFurLength($furLength)
    {
        $this->furLength = $furLength;
    }
}