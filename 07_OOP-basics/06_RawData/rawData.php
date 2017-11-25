<?php
include('classes/Cargo.php');
include('classes/Engine.php');
include('classes/Tire.php');
include('classes/Car.php');

$n = intval(fgets(STDIN));
$cars = [];

for ($i = 0; $i < $n; $i++) {
    $tokens = explode(' ', trim(fgets(STDIN)));

    $model = $tokens[0];
    $engine = new Engine(intval($tokens[1]), intval($tokens[2]));
    $cargo = new Cargo(intval($tokens[3]), $tokens[4]);

    $tire_1 = new Tire(floatval($tokens[5]), intval($tokens[6]));
    $tire_2 = new Tire(floatval($tokens[7]), intval($tokens[8]));
    $tire_3 = new Tire(floatval($tokens[9]), intval($tokens[10]));
    $tire_4 = new Tire(floatval($tokens[11]), intval($tokens[12]));
    $tireList = [$tire_1, $tire_2, $tire_3, $tire_4];

    $car = new Car($model, $engine, $cargo, $tireList);
    array_push($cars, $car);
}

$command = trim(fgets(STDIN));

if ($command == 'fragile') {
    printFragileCars($cars);
} else if ($command == 'flamable') {
    printFlamableCar($cars);
}

function printFragileCars($cars)
{
    foreach ($cars as $car) {
        if ($car->cargo->type == "fragile") {
            foreach ($car->tires as $tire) {
                if ($tire->pressure < 1) {
                    echo $car->model . "\n";
                    break;
                }
            }
        }
    }
}

function printFlamableCar($cars)
{
    foreach ($cars as $car) {
        if ($car->cargo->type == "flamable" && $car->engine->power > 250) {
            echo $car->model . "\n";
        }
    }
}

