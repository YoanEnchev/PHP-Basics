<?php

class Cruiser extends Starship
{
    public function __construct($shipName, $starSystem, array $enchantments = [])
    {
        parent::__construct($shipName, $starSystem, $enchantments);
        $this->health += 100;
        $this->shields += 100;
        $this->damage += 50;
        $this->fuel =+ 300;

        $this->projectile = new PenetrationShell($this->damage);
    }
}