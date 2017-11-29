<?php

class Siamese extends Cat
{
    protected $earSize;

    public function __construct(string $name, int $earSize)
    {
        parent::__construct($name);
        $this->setEarSize($earSize);
    }

    public function __toString()
    {
        $name = parent::__toString();
        return "Siamese {$name} {$this->getEarSize()}\n";
    }

    public function getEarSize()
    {
        return $this->earSize;
    }

    public function setEarSize(int $earSize)
    {
        $this->earSize = $earSize;
    }

}