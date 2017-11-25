<?php
include ('Employee.php');

$n = fgets(STDIN);
$departmentAndEmployees = [];

for ($i = 0; $i < $n; $i++) {
    $tokens = explode(' ', fgets(STDIN));
    $name = $tokens[0];
    $salary = floatval($tokens[1]);
    $position = trim($tokens[2]);
    $department = trim($tokens[3]);

    if(count($tokens) == 4) {
        $employee = new Employee($name, $salary, $position, $department);
    }
    else if(count($tokens) == 5) {
        $email = trim($tokens[4]);
        $employee = new Employee($name, $salary, $position, $department, $email);
    }
    else { //all arguments given
        $email = trim($tokens[4]);
        $age = intval($tokens[5]);
        $employee = new Employee($name, $salary, $position, $department, $email, $age);
    }

    if(!isset($departmentAndEmployees[$department])) {
        $departmentAndEmployees[$department] = [];
    }

   array_push($departmentAndEmployees[$department], $employee);
}

$departmentAndAvSalary =  getDepartmentAndAverSalary($departmentAndEmployees);
$highestAvSalary = max($departmentAndAvSalary);

$dep_highestSalaries = array_search($highestAvSalary, $departmentAndAvSalary);
$employees_highestSalDep = $departmentAndEmployees[$dep_highestSalaries];
usort($employees_highestSalDep, "sortEmployees");

echo "Highest Average Salary: {$dep_highestSalaries}\n";
printEmployeesFromDep($employees_highestSalDep);

function sortEmployees($a, $b)
{
    return $b->salary - $a->salary;
}

function getDepartmentAndAverSalary($departmentAndEmployees) {
    $departmentAndAvSalary = [];

    foreach ($departmentAndEmployees as $department => $employeeList) {
        $sum = 0;
        foreach ($employeeList as $employee) {
            $sum+= $employee->salary;
        }

        $departmentAndAvSalary[$department] = $sum / sizeof($employeeList);
    }

    return $departmentAndAvSalary;
}

function printEmployeesFromDep($employeeList) {
    foreach ($employeeList as $employee) {
        $salary = number_format((float)$employee->salary, 2, '.', '');
        echo "{$employee->name} {$salary} {$employee->email} {$employee->age}\n";
    }
}
