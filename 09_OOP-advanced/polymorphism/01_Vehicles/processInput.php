<?php
include 'interfaces/IDrive.php';
include 'classes/Vehicle.php';
include 'classes/Car.php';
include 'classes/Truck.php';

$tokens = explode(' ', trim(fgets(STDIN)));
$car = new Car(floatval($tokens[1]), floatval($tokens[2]));

$tokens = explode(' ', trim(fgets(STDIN)));
$truck = new Truck(floatval($tokens[1]), floatval($tokens[2]));

$commandCount = intval(fgets(STDIN));
for ($i = 0; $i < $commandCount; $i++) {
    $commandTokens = explode(' ', trim(fgets(STDIN)));
    $vehicle = $commandTokens[1];
    $command = $commandTokens[0];

    if($vehicle == "Car") {
        if($command == "Drive") {
            $car->drive(floatval($commandTokens[2]));
        }
        else if($command == "Refuel") {
            $car->refuel(floatval($commandTokens[2]));
        }
    }

    else if ($vehicle == "Truck") {
        if($command == "Drive") {
            $truck->drive(floatval($commandTokens[2]));
        }
        else if($command == "Refuel") {
            $truck->refuel(floatval($commandTokens[2]));
        }
    }
}

$fuel_car = number_format($car->getFuel(), 2, '.', '');
$fuel_truck = number_format($truck->getFuel(), 2, '.', '');

echo "Car: {$fuel_car}\n";
echo "Truck: {$fuel_truck}";