<?php

class Character
{
    protected $username;
    protected $level;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}