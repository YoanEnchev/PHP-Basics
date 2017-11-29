<?php
include "Human.php";
include "Student.php";
include "Worker.php";

$studentData = trim(fgets(STDIN));
$workerData = trim(fgets(STDIN));

$studentTokens = explode(' ', $studentData);
$firstName = $studentTokens[0];
$lastName = $studentTokens[1];
$facultyNumber = $studentTokens[2];

$student = new Student($firstName, $lastName, $facultyNumber);

$workerTokens = explode(' ', $workerData);
$firstName = $workerTokens[0];
$lastName = $workerTokens[1];
$weekSalary = floatval($workerTokens[2]);
$workHoursPerDay = floatval($workerTokens[3]);

$worker = new Worker($firstName, $lastName, $weekSalary, $workHoursPerDay);

echo $student;
echo "\n";
echo $worker;
