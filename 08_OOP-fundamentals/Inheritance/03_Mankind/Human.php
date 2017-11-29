<?php

class Human
{
    protected $firstName;
    protected $lastName;

    protected function getFirstName()
    {
        return $this->firstName;
    }

    protected function setFirstName($firstName)
    {
        $asciiCode = ord($firstName[0]);

        if ($asciiCode < 65 || $asciiCode > 90) //not capital letter
        {
            throw new Error("Expected upper case letter!Argument: firstName");
        }

        if (strlen($firstName) < 4) { //too short name
            throw new Error("Expected length at least 4 symbols!Argument: firstName");
        }

        $this->firstName = $firstName;
    }

    protected function getLastName()
    {
        return $this->lastName;
    }

    protected function setLastName($lastName)
    {
        $asciiCode = ord($lastName[0]);

        if ($asciiCode < 65 || $asciiCode > 90) //not capital letter
        {
            throw new Error("Expected upper case letter!Argument: lastName");
        }

        if (strlen($lastName) < 3) { //too short name
            throw new Error("Expected length at least 3 symbols!Argument: lastName");
        }

        $this->lastName = $lastName;
    }

    public function __construct($firstName, $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    public function __toString()
    {
        $firstName = "First Name: {$this->getFirstName()}\n";
        $lastName = "Last Name: {$this->getLastName()}\n";
        return $firstName . $lastName;
    }
}