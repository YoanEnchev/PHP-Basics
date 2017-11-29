<?php

class Child extends Person
{
    function __construct($name, $age)
    {
        parent::__construct($name, $age);
    }

    protected function setAge(int $age)
    {
        if($age > 15) {
            throw new Exception("Child’s age must be less than 16!");
        }
    }
}
