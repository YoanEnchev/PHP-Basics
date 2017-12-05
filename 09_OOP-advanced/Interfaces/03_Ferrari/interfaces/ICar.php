<?php

Interface ICar
{
    public function getModel();
    public function getDriver();
    public function setDriver(string $driver);
    public function useBrakes();
    public function pushGasPedal();
    public function __toString();
}