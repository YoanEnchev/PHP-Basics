<?php

class Worker extends Human
{
    protected $weekSalary;
    protected $workHoursPerDay;

    public function __construct(string $firstName, string $lastName, float $weekSalary, float $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkingHoursPerDay($workHoursPerDay);
    }

    protected function setLastName($lastName)
    {
        if (strlen($lastName) < 4) {
            throw new Error("Expected length more than 3 symbols!Argument: lastName");
        }

        $this->lastName = $lastName;
    }

    protected function getWeekSalary()
    {
        return $this->weekSalary;
    }

    protected function setWeekSalary($weekSalary)
    {
        if($weekSalary <= 10) {
            throw new Error("Expected value mismatch! Argument: weekSalary");
        }

        $this->weekSalary = $weekSalary;
    }

    protected function getWorkingHoursPerDay()
    {
        return $this->workHoursPerDay;
    }

    protected function setWorkingHoursPerDay($workingHoursPerDay)
    {
        if($workingHoursPerDay < 1 || $workingHoursPerDay > 12) {
            throw new Error("Expected value mismatch! Argument: workHoursPerDay");
        }

        $this->workHoursPerDay = $workingHoursPerDay;
    }

    public function __toString()
    {
        $firstAndLastName =  parent::__toString();

        $salaryOnWeek = number_format((float)$this->getWeekSalary(), 2, '.', '');
        $weekSalary = "Week Salary: {$salaryOnWeek}\n";

        $workingHoursPerDay = $this->getWorkingHoursPerDay();
        $workingHoursPerDay = number_format((float)$workingHoursPerDay, 2, '.', '');
        $hoursPerDay = "Hours per day: {$workingHoursPerDay}\n";

        $hourSalary = $this->getWeekSalary() / (7 * $this->getWorkingHoursPerDay());
        $hourSalary = number_format((float)$hourSalary, 2, '.', '');
        $salaryPerHour = "Salary per hour: {$hourSalary}\n";

        return $firstAndLastName . $weekSalary . $hoursPerDay . $salaryPerHour;
    }
}