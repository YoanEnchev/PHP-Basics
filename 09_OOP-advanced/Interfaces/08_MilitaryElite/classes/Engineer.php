<?php

class Engineer extends SpecialisedSoldier implements IEngineer
{
    private $repairs;

    public function __construct($id, $firstName, $lastName, $salary, $corps, array $repairs)
    {
        parent::__construct($id, $firstName, $lastName, $salary, $corps);
        $this->repairs = $repairs;
    }

    public function getRepairs()
    {
       return $this->repairs;
    }
}