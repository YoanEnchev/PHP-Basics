<?php

class ShieldReaver extends Projectile
{
    public function removeHealth(int $targetShields): int
    {
       return $this->getDamage();
    }

    public function removeShields(): int
    {
        return 2 * $this->getDamage();
    }
}