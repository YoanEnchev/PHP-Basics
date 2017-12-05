<?php
include 'interfaces/IAnimal.php';
include 'interfaces/ICat.php';

function __autoload($className)
{
    include_once 'classes/'.$className.'.php';
}

$animals = [];

while (true)
{
    $input_animal = trim(fgets(STDIN));
    $animalTokens = explode(' ', $input_animal);

    if($input_animal == "End")
    {
        break;
    }

    $className = $animalTokens[0];
    if(sizeof($animalTokens) == 4) {
        $animal = new $className($animalTokens[1], floatval($animalTokens[2]), $animalTokens[3]);
    }

    else if(sizeof($animalTokens) == 5) {
        $animal = new $className($animalTokens[1], floatval($animalTokens[2]), $animalTokens[3], $animalTokens[4]);
    }

    $input_food = trim(fgets(STDIN));
    $foodTokens = explode(' ', $input_food);

    $foodName = $foodTokens[0];
    $food = new $foodName(intval($foodTokens[1]));

    $animal->eat($food);
    array_push($animals, $animal);
}

foreach ($animals as $animal) {
    echo $animal;
}