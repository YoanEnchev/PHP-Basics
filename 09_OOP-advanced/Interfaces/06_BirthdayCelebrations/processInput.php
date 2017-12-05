<?php
include 'interfaces/IDefined.php';
include 'interfaces/IBirthday.php';
include 'classes/Citizen.php';
include 'classes/Robot.php';
include 'classes/Pet.php';

$input = trim(fgets(STDIN));
$inhabitants = [];

while ($input != "End") {
    $tokens = explode(' ', $input);
    $className = $tokens[0];

    $input = trim(fgets(STDIN));
    if (sizeof($tokens) == 5) {
        $inhabitant = new $className($tokens[1], $tokens[2], intval($tokens[3]), $tokens[4]);
    } else if (sizeof($tokens) == 3) {
        $inhabitant = new $className($tokens[1], $tokens[2]);
    }

    array_push($inhabitants, $inhabitant);
}

$searchYear = trim(fgets(STDIN));
$noInput = true;

foreach ($inhabitants as $inhabitant) {
    $className = get_class($inhabitant);

    if(method_exists  ( $className,  'getBirthday')) {
        $birthday = $inhabitant->getBirthday();
        $year = explode('/', $birthday)[2];

        if($year == $searchYear) {
            echo $birthday. "\n";
            $noInput = false;
        }
    }
}

if($noInput) {
    echo "<no output>";
}
