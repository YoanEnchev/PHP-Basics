<?php

class Frigate extends Starship
{
    private $projectileCount;

    public function __construct($shipName, $starSystem, array $enchantments = [])
    {
        parent::__construct($shipName, $starSystem, $enchantments);
        $this->health += 60;
        $this->shields += 50;
        $this->damage += 30;
        $this->fuel += 220;

        $this->projectileCount = 0;
        $this->projectile = new ShieldReaver($this->damage);
    }

    public function IncreaseProjectileCount()
    {
        $this->projectileCount++;
    }

    public function projectileCount()
    {
        return $this->projectileCount;
    }
}