<?php
include "Citizen.php";

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));

$citizen = new Citizen($name, $age);
echo $citizen->getName() . "\n";
echo $citizen->getAge();