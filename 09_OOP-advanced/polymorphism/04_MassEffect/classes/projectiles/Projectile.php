<?php

abstract class Projectile implements IProjectile
{
    private $damage;

    public function __construct(int $damage)
    {
        $this->damage = $damage;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }
}