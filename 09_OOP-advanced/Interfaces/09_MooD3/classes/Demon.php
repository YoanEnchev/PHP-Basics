<?php

class Demon extends Character implements ICharacter
{
    private $energy;

    public function __construct(string $username, float $specialPoints, int $level)
    {
        $this->username = $username;
        $this->energy = $specialPoints;
        $this->level = $level;
    }

    public function __toString()
    {
        $username = $this->getUsername();
        $energy = $this->getSpecialPoints();
        $hashed = $this->getHashedPassword();
        $score = $this->getSpecialPoints() * $this->getLevel();

        return "\"$username\" | \"$hashed\" -> Demon\n $score";
    }

    public function getSpecialPoints(): float
    {
        return $this->energy;
    }

    public function getHashedPassword(): string
    {
        return strlen($this->getUsername()) * 217;
    }
}