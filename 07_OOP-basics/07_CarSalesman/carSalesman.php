<?php
include 'Engine.php';
include 'Car.php';

$n = intval(fgets(STDIN));
$engines = [];
//engines:
for ($i = 0; $i < $n; $i++) {
    $engine = [];
    $tokens = explode(' ', trim(fgets(STDIN)));
    $model = $tokens[0];
    $power = intval($tokens[1]);

    if (count($tokens) == 2) {
        $engine = new Engine($model, $power);
    }
    else if (count($tokens) == 3) {
        $displacement = intval($tokens[2]);
        $engine = new Engine($model, $power, $displacement);
    }
    else if (count($tokens) == 4) {
        $displacement = intval($tokens[2]);
        $efficiency = $tokens[3];
        $engine = new Engine($model, $power, $displacement, $efficiency);
    }

    array_push($engines, $engine);
}

$n = intval(fgets(STDIN));
$cars = [];
//cars:
for ($i = 0; $i < $n; $i++) {
    $car = [];
    $tokens = explode(' ', trim(fgets(STDIN)));

    $model_car = $tokens[0];
    $engine_model = $tokens[1];
    $engine = getEngine($engines, $engine_model);

    if (sizeof($tokens) == 2) {
        $car = new Car($model_car, $engine);
    }
    else if (sizeof($tokens) == 3) {
        $weight = intval($tokens[2]);
        $car = new Car($model_car, $engine, $weight);
    }
    else if (sizeof($tokens) == 4) {
        $weight = intval($tokens[2]);
        $color = $tokens[3];
        $car = new Car($model_car, $engine, $weight, $color);
    }

    array_push($cars, $car);
}

printCars($cars);

function getEngine($engines, $searchFor): Engine
{
    foreach ($engines as $engine) {
        if ($engine->model == $searchFor) {
            return $engine;
        }
    }

    return new Engine('n/a', 0); //invalid
}

function printCars($cars)
{
    foreach ($cars as $car) {
        echo "{$car->model}:\n";

        $engine = $car->engine;
        echo "  {$engine->model}\n";
        echo "      Power: {$engine->power}\n";
        echo "      Displacement: {$engine->displacement}\n";
        echo "      Efficiency: {$engine->efficiency}\n";

        if($car->weight == 0) {
            echo "Weight: n/a\n";
        }
        else {
            echo "  Weight: {$car->weight}\n";
        }
        echo "  Color: {$car->color}\n";
    }
}