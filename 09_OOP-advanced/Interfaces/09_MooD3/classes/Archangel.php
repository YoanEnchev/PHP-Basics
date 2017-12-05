<?php

class Archangel extends Character implements ICharacter
{
    private $mana;

    public function __construct(string $username, float $specialPoints, int $level)
    {
        $this->username = $username;
        $this->mana = $specialPoints;
        $this->level = $level;
    }

    public function __toString()
    {
        $username = $this->getUsername();
        $hashed = $this->getHashedPassword();
        $score = $this->getSpecialPoints() * $this->getLevel();

        return "\"$username\" | \"$hashed\" -> Archangel\n$score";
    }

    public function getSpecialPoints(): int
    {
        return $this->mana;
    }

    public function getHashedPassword(): string
    {
        $username = $this->getUsername();
        return strrev($username) . (strlen($username) * 21);
    }
}