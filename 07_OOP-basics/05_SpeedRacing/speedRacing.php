<?php
include('Car.php');

$n = intval(fgets(STDIN));
$cars = [];

for ($i = 0; $i < $n; $i++) {
    $tokens = explode(' ', trim(fgets(STDIN)));
    $model = $tokens[0];
    $fuelAmount = floatval($tokens[1]);
    $fuelCostPerKm = floatval($tokens[2]);

    $car = new Car($model, $fuelAmount, $fuelCostPerKm);
    array_push($cars, $car);
}


while(true) {
    $tokens = explode(' ', trim(fgets(STDIN)));

    if($tokens[0] == "End") {
        break;
    }

    $model = $tokens[1];
    $amountOfKm = floatval($tokens[2]);
    driveCar($model, $amountOfKm, $cars);
}

printCars($cars);

function printCars($cars)
{
    foreach ($cars as $car) {
        $fuelAmount = number_format((float)$car->fuelAmount, 2, '.', '');
        echo "{$car->model} {$fuelAmount} {$car->distanceTravelled}\n";
    }
}

function driveCar($model, $amountOfKm, $cars) {
    foreach ($cars as $car) {
        if($car->model == $model) {
            $fuelConsumed = $car->fuelCostPerKm * $amountOfKm;

            if($fuelConsumed > $car->fuelAmount) {
                echo "Insufficient fuel for the drive\n";
            }
            else {
                $car->fuelAmount -= $fuelConsumed;
                $car->distanceTravelled += $amountOfKm;
            }
        }
    }
}
