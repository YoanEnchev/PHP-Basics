<?php

class Commando extends SpecialisedSoldier implements ICommando
{
    protected $misson;

    public function __construct($id, $firstName, $lastName, $salary, $corps, Misson $misson)
    {
        parent::__construct($id, $firstName, $lastName, $salary, $corps);
        $this->misson = $misson;
    }

    public function getMisson()
    {
        return $this->misson;
    }
}