<?php
include 'interfaces/IDefined.php';
include 'classes/Citizen.php';
include 'classes/Robot.php';

$input = trim(fgets(STDIN));
$inhabitants = [];

while ($input != "End") {
    $tokens = explode(' ', $input);

    if (sizeof($tokens) == 2) { //robot
        $model = $tokens[0];
        $id =$tokens[1];
        $robot = new Robot($id, $model);
        array_push($inhabitants, $robot);
    }

    else if(sizeof($tokens) == 3) {
        $name = $tokens[0];
        $age = intval($tokens[1]);
        $id = $tokens[2];
        $citizen = new Citizen($id, $name, $age);
        array_push($inhabitants, $citizen);
    }

    $input = trim(fgets(STDIN));
}

$rebelSuffix = trim(fgets(STDIN));

foreach ($inhabitants as $inhabitant)
{
    $id = $inhabitant->getId();
    $lastSymbols = substr(strrev($id), 0, strlen($rebelSuffix));
    $endsWith_id = strrev($lastSymbols);

    if($endsWith_id == $rebelSuffix) {
        echo "{$id}\n";
    }
}
