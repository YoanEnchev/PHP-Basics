<?php
include "Interfaces/IPerson.php";
include "Interfaces/IBirthable.php";
include "Interfaces/IDentifiable.php";
include "Classes/Citizen.php";

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));
$id = trim(fgets(STDIN));
$date = trim(fgets(STDIN));

$citizen = new Citizen($id, $name, $age, $date);

echo $citizen->getName() . "\n";
echo $citizen->getAge(). "\n";
echo $citizen->getId() . "\n";
echo $citizen->getBirthdate();