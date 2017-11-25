<?php
include ('Person.php');

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));

$person_1 = new Person($name, $age);
echo "{$person_1->name} {$person_1->age}";