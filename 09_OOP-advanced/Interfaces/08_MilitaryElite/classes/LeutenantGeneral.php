<?php

class LeutenantGeneral extends PrivateSoilder implements ILentenantGeneral
{
    private $privates;

    public function __construct(string $id, string $firstName, string $lastName, float $salary, array $privates)
    {
        parent::__construct($id, $firstName, $lastName, $salary);
        $this->privates = $privates;
    }

    public function getPrivateSet()
    {
        return $this->privates;
    }
}