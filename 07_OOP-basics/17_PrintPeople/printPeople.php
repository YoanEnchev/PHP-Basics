<?php
include ('People.php');

$input = trim(fgets(STDIN));
$people = [];

while ($input != "END") {
    $tokens = explode(' ', $input);
    $name = $tokens[0];
    $age = intval($tokens[1]);
    $occupation = $tokens[2];

    $person = new People($name, $age, $occupation);
    array_push($people, $person);
    $input = trim(fgets(STDIN));
}

usort($people, "sortByAge");
printPeople($people);

function printPeople($people)
{
    foreach ($people as $person) {
        echo $person;
    }
}

function sortByAge($person_1, $person_2)
{
    return $person_1->age - $person_2->age;
}

