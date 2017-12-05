<?php
/**
 * Created by PhpStorm.
 * User: joanb
 * Date: 11/29/2017
 * Time: 10:03 PM
 */

class PrivateSoilder extends Soilder implements IPrivate
{
    protected $salary;

    public function __construct(string $id, string $firstName, string $lastName, float $salary)
    {
        parent::__construct($id, $firstName, $lastName);
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}