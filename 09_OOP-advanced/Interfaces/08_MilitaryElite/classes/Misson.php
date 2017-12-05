<?php

class Misson implements IMisson
{
    private $code;
    private $name;
    private $state;

    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
        $this->state = "inProgress";
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getState()
    {
        return $this->state;
    }

    public function completeMisson()
    {
        $this->state = "Finished";
    }
}