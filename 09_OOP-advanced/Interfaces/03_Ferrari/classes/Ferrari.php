<?php

class Ferrari implements ICar
{
    private $model;
    private $driver;

    public function __construct(string $driver)
    {
        $this->driver = $driver;
        $this->model = "488-Spider";
    }

    public function __toString()
    {
        return "{$this->model}/{$this->useBrakes()}/{$this->pushGasPedal()}/{$this->getDriver()}";
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public function setDriver(string $driver)
    {
        $this->driver = $driver;
    }

    public function useBrakes()
    {
        return "Brakes";
    }

    public function pushGasPedal()
    {
        return "Zadu6avam sA!";
    }
}