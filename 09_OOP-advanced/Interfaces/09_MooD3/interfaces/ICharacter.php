<?php

interface ICharacter
{
    public function getUsername(): string;
    public function getHashedPassword(): string;
    public function getLevel(): int;
    public function getSpecialPoints();
}