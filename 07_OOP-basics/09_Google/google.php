<?php
include('classes/Car.php');
include('classes/Company.php');
include('classes/Children.php');
include('classes/Guardian.php');
include('classes/Pokemon.php');
include('classes/Person.php');

$nameAndCharacteristics = []; //name <-> class Person
$input = trim(fgets(STDIN));

while ($input != "End") {
    $tokens = explode(' ', $input);
    $personName = $tokens[0];

    if (!isset($nameAndCharacteristics[$personName])) {
        $nameAndCharacteristics[$personName] = new Person();
    }

    switch ($tokens[1]) {
        case 'company':
            addCompanyInfo($nameAndCharacteristics, $personName, $tokens);
            break;
        case 'car':
            addCarInfo($nameAndCharacteristics, $personName, $tokens);
            break;
        case 'pokemon':
            addPokemonInfo($nameAndCharacteristics, $personName, $tokens);
            break;
        case 'parents':
            addParentsInfo($nameAndCharacteristics, $personName, $tokens);
            break;
        case 'children':
            addChildrenInfo($nameAndCharacteristics, $personName, $tokens);
            break;

    }

    $input = trim(fgets(STDIN));
}

$detailsName = trim(fgets(STDIN));
printDetailsAboutPerson($detailsName, $nameAndCharacteristics);


function addCompanyInfo(&$nameAndCharacteristics, $personName, $tokens): void
{
    $position = $tokens[2];
    $department = $tokens[3];
    $salary = floatval($tokens[4]);

    $company = new Company($position, $department, $salary);
    $nameAndCharacteristics[$personName]->company = $company;
}

function addCarInfo(&$nameAndCharacteristics, $personName, $tokens): void
{
    $model = $tokens[2];
    $speed = floatval($tokens[3]);

    $car = new Car($model, $speed);
    $nameAndCharacteristics[$personName]->car = $car;
}

function addPokemonInfo(&$nameAndCharacteristics, $personName, $tokens): void
{
    $name = $tokens[2];
    $element = $tokens[3];

    $pokemon = new Pokemon($name, $element);
    array_push($nameAndCharacteristics[$personName]->pokemon, $pokemon);
}

function addParentsInfo(&$nameAndCharacteristics, $personName, $tokens): void
{
    $name = $tokens[2];
    $birthday = $tokens[3];

    $parent = new Guardian($name, $birthday);
    array_push($nameAndCharacteristics[$personName]->parents, $parent);
}

function addChildrenInfo(&$nameAndCharacteristics, $personName, $tokens): void
{
    $name = $tokens[2];
    $birthday = $tokens[3];

    $child = new Children($name, $birthday);
    array_push($nameAndCharacteristics[$personName]->children, $child);
}

function printDetailsAboutPerson($detailsName, $nameAndCharacteristics)
{
    $person = $nameAndCharacteristics[$detailsName];
    echo $detailsName . "\n";

    echo "Company:\n";
    echo $person->company;

    echo "Car:\n";
    echo "{$person->car}";

    echo "Pokemon:\n";
    foreach ($person->pokemon as $pokemon) {
        echo $pokemon;
    }

    echo "Parents: \n";
    foreach ($person->parents as $parent) {
        echo $parent;
    }

    echo "Children:\n";
    foreach ($person->children as $child) {
        echo $child;
    }

}