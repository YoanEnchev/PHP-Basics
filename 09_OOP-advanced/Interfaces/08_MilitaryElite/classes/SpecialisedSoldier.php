<?php

class SpecialisedSoldier extends PrivateSoilder implements ISpecializedSoilder
{
    protected $corps;

    public function __construct(string $id, string $firstName, string $lastName,float $salary, string $corps)
    {
        parent::__construct($id, $firstName, $lastName, $salary);
        $this->corps = $corps;
    }

    public function getCorps()
    {
        return $this->corps;
    }
}