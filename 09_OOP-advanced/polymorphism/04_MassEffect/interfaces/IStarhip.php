<?php

interface IStarhip
{
    public function addEnchantments(array $enchantments);

    public function attack(Starship $target);
}