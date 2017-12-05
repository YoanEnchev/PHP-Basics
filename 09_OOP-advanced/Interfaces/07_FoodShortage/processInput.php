<?php
include 'interfaces/IDefined.php';
include 'interfaces/IBirthday.php';
include 'interfaces/IBuyer.php';
include 'classes/Citizen.php';
include 'classes/Rebel.php';

$inhabitantsCount = intval(fgets(STDIN));
$inhabitants = [];

for ($i = 0; $i < $inhabitantsCount; $i++) {
    $input = fgets(STDIN);
    $tokens = explode(' ', $input);

    if (sizeof($tokens) == 4) { //citizen
        $id = $tokens[2];
        $name = $tokens[0];
        $age = intval($tokens[1]);
        $birthday = $tokens[3];
        $inhabitant = new Citizen($id, $name, $age, $birthday);

    } else if (sizeof($tokens) == 3) { //rebel
        $name = $tokens[0];
        $age = intval($tokens[1]);
        $group = $tokens[2];
        $inhabitant = new Rebel($name, $age, $group);
    }

    array_push($inhabitants, $inhabitant);
}

$name = trim(fgets(STDIN));

while ($name != "End") {
    foreach ($inhabitants as $inhabitant) {
        if($inhabitant->getName() == $name) {
            $inhabitant->buyFood();
        }
    }

    $name = trim(fgets(STDIN));
}

echo totalBoughtFood($inhabitants);

function totalBoughtFood($inhabitants)
{
    $food = 0;

    foreach ($inhabitants as $inhabitant) {
        $food += $inhabitant->getFood();
    }

    return $food;
}
