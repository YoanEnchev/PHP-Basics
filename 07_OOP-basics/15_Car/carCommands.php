<?php
include ('Car.php');

$carSpecifics = explode(' ', trim(fgets(STDIN)));
list($speed, $fuel, $fuelEconomy) = array_map('intval', $carSpecifics);

$car = new Car($speed, $fuel, $fuelEconomy);
$command = trim(fgets(STDIN));

while ($command != "END") {
    $tokens = explode(' ', $command);
    $action = $tokens[0];

    switch ($action) {
        case 'Travel':
            $distance = intval($tokens[1]);
            $car->travel($distance);
            break;
        case 'Refuel':
            $litters = intval($tokens[1]);
            $car->refuel($litters);
            break;
        case 'Distance':
            $car->printTravelledDistance();
            break;
        case 'Time':
            $car->printTravelledTime();
            break;
        case 'Fuel':
            $car->printLeftFuel();
            break;
    }

    $command = trim(fgets(STDIN));
}