<?php

class Employee
{
    private $firstName;
    private $middleName;
    private $lastName;
    private $department;
    private $position;
    private $passID;

    public function __construct($firstName, $middleName, $lastName, $department, $position, $passID)
    {
        $this->setFirstName($firstName);
        $this->setMiddleName($middleName);
        $this->setLastName($lastName);
        $this->setDepartment($department);
        $this->setPosition($position);
        $this->setPassID($passID);
    }

    public function insertEmployee(PDO $db)
    {
        $firstName = $this->getFirstName();
        $middleName = $this->getMiddleName();
        $lastName = $this->getLastName();
        $department = $this->getDepartment();
        $position = $this->getPosition();
        $passID = $this->getPassID();

        $stmt = $db->prepare("INSERT INTO EMPLOYEE(first_name, middle_name, last_name, department, position, passport_id)
        VALUES (:first_name, :middle_name, :last_name, :department, :position, :passport_id)");
        $stmt->bindParam('first_name', $firstName);
        $stmt->bindParam('middle_name', $middleName);
        $stmt->bindParam('last_name', $lastName);
        $stmt->bindParam('department', $department);
        $stmt->bindParam('position', $position);
        $stmt->bindParam('passport_id', $passID);
        $stmt->execute();
        echo "New employee $firstName $middleName $lastName  saved";
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPassID()
    {
        return $this->passID;
    }

    public function setPassID($passID)
    {
        $this->passID = $passID;
    }
}