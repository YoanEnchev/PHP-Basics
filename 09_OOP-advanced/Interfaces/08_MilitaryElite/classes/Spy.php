<?php

class Spy extends Soilder implements ISpy
{
    private $codeNumber;

    public function __construct($id, $firstName, $lastName, $codeNumber)
    {
        parent::__construct($id, $firstName, $lastName);
        $this->codeNumber = $codeNumber;
    }

    public function getCodeNumber()
    {
        return $this->codeNumber;
    }
}