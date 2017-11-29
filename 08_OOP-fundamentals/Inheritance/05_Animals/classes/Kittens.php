<?php

class Kitten extends Cat
{
    public function __construct($name, $age, $gender="Female")
    {
        parent::__construct($name, $age, $gender="Female");
    }

    protected function setGender($gender)
    {
        if($gender != "Female") {
            throw new Error('Kitten gender can only be "Female"');
        }

        $this->gender = $gender;
    }

    public function produceSound()
    {
        echo "Miau\n";
    }
}