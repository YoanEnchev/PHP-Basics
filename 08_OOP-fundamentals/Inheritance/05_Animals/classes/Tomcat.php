<?php

class Tomcat extends Cat
{
    public function __construct($name, $age, $gender="Male")
    {
        parent::__construct($name, $age, $gender="Male");
    }

    protected function setGender($gender)
    {
        if($gender != "Male") {
            throw new Error('Tomcats gender can only be "Male"');
        }

        $this->gender = $gender;
    }

    public function produceSound()
    {
        echo "Give me one million b***h\n";
    }
}