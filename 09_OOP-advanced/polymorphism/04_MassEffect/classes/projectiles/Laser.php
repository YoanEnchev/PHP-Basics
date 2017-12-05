<?php

class Laser extends Projectile
{
    public function removeHealth(int $targetShields): int
    {
        $damage = $this->getDamage() - $targetShields;

        if($damage > 0)
        {
            return $damage;
        }

        return 0;
    }

    public function removeShields(): int
    {
        return $this->getDamage();
    }
}