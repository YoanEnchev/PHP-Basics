<?php

interface IProjectile
{
    public function removeHealth(int $targetShields);

    public function removeShields();
}