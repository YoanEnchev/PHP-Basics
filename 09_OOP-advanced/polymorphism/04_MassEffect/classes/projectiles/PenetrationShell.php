<?php

class PenetrationShell extends Projectile
{
    public function removeHealth(int $targetShields): int
    {
        return $this->getDamage();
    }

    public function removeShields(): int
    {
        return 0;
    }
}