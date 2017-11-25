<?php
include 'Person.php';
include 'Family.php';

$n = intval(fgets(STDIN));
$family = new Family();

for ($i = 0; $i < $n; $i++) {
    $tokens = explode(' ', fgets(STDIN));
    $name = $tokens[0];
    $age = intval($tokens[1]);

    $person = new Person($name, $age);
    $family->addMember($person);
}

echo $family->getOldestMember();

