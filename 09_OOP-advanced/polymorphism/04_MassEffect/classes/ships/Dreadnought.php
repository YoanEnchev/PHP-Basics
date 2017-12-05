<?php

class Dreadnought extends Starship implements IDefenseBeforeAttack
{
    public function __construct($shipName, $starSystem, array $enchantments = [])
    {
        parent::__construct($shipName, $starSystem, $enchantments);
        $this->health += 200;
        $this->shields += 300;
        $this->damage += 150;
        $this->fuel += 700;

        $this->projectile = new Laser($this->shields / 2 + $this->damage);
    }

    public function raiseShields_beforeAttack()
    {
        $this->shields += 50;
    }

    public function removeShields_afterAttack()
    {
        $this->shields -= 50;

        if($this->shields < 0)
        {
            $this->shields = 0;
        }
    }
}