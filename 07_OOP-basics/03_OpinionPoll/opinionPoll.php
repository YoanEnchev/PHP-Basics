<?php
include('Person.php');

$n = intval(fgets(STDIN));
$persons = [];

for ($i = 0; $i < $n; $i++) {
    $tokens = explode(' ', fgets(STDIN));
    $name = $tokens[0];
    $age = intval($tokens[1]);

    $person = new Person($name, $age);
    array_push($persons, $person);
}

$persons = array_filter($persons, 'removeYoung');
usort($persons, "sortAlphabetically");
printPersons($persons);

function sortAlphabetically(Person $a, Person $b)
{
    return strcmp($a->name, $b->name);
}

function removeYoung(Person $person)
{
    return $person->age >= 30;
}

function printPersons(array $persons) {
    foreach ($persons as $person) {
        echo "{$person->name} {$person->age}\n";
    }
}