<?php

class Student
{
    private $firstName;
    private $lastName;
    private $email;
    private $score;

    public function __construct(string $firstName, string $lastName, string $email, int $score)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->score = $score;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}