<?php
include "classes/Animal.php";
include "classes/Dog.php";
include "classes/Frog.php";
include "classes/Cat.php";
include "classes/Kittens.php";
include "classes/Tomcat.php";

$input = trim(fgets(STDIN));

while($input != "Beast!") {
    $tokens = explode(' ', $input);

    if(sizeof($tokens) < 4) {
        throw new Exception("Invalid input!");
    }

    $animal = $tokens[0];
    $name = $tokens[1];
    $age = intval($tokens[2]);
    $gender = $tokens[3];

    getAndPrintDetails($animal, $name, $age, $gender);
    $input = trim(fgets(STDIN));
}

function getAndPrintDetails($animal, $name, $age, $gender)
{
    switch ($animal){
        case 'Dog':
            $specie = new Dog($name, $age, $gender);
            break;

        case 'Frog':
            $specie = new Frog($name, $age, $gender);
            break;

        case 'Cat':
            if($gender == "Male") {
                $specie = new Tomcat($name, $age);
            }

            else if ($gender == "Female") {
                $specie = new Kitten($name, $age);
            }
            break;

        default:
            $specie = new Animal($name, $age, $gender);
    }

    echo "{$animal} {$name} {$age} {$gender}\n";
    $specie->produceSound();
}