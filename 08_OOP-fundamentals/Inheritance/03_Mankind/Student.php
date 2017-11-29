<?php

class Student extends Human
{
    protected $facultyNumber;

    public function __construct($firstName, $lastName, $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    protected function getFacultyNumber()
    {
        return $this->facultyNumber;
    }

    protected function setFacultyNumber($facultyNumber)
    {
        if(strlen($facultyNumber) < 5 || strlen($facultyNumber) > 10 ) {
            throw new Error("Invalid faculty number!");
        }

        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        $firstAndLastName =  parent::__toString();
        $facultyNumber = "Faculty number: {$this->getFacultyNumber()}\n";
        return $firstAndLastName. $facultyNumber;
    }
}