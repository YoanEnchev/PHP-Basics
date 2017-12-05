<?php
include 'interfaces/IDrive.php';
include 'classes/Vehicle.php';
include 'classes/Car.php';
include 'classes/Truck.php';
include 'classes/Bus.php';

$tokens = explode(' ', trim(fgets(STDIN)));
$car = new Car(floatval($tokens[1]), floatval($tokens[2]), floatval($tokens[3]));

$tokens = explode(' ', trim(fgets(STDIN)));
$truck = new Truck(floatval($tokens[1]), floatval($tokens[2]), floatval($tokens[3]));

$tokens = explode(' ', trim(fgets(STDIN)));
$bus = new Bus(floatval($tokens[1]), floatval($tokens[2]), floatval($tokens[3]));

print_r($car);
print_r($truck);
print_r($bus);

$commandCount = intval(fgets(STDIN));
for ($i = 0; $i < $commandCount; $i++) {
    $commandTokens = explode(' ', trim(fgets(STDIN)));
    $vehicle = $commandTokens[1];
    $command = $commandTokens[0];

    if ($vehicle == "Car") {
        if ($command == "Drive") {
            $car->drive(floatval($commandTokens[2]));
        } else if ($command == "Refuel") {
            $car->refuel(floatval($commandTokens[2]));
        }
    } else if ($vehicle == "Truck") {
        if ($command == "Drive") {
            $truck->drive(floatval($commandTokens[2]));
        } else if ($command == "Refuel") {
            $truck->refuel(floatval($commandTokens[2]));
        }
    } else if ($vehicle == "Bus") {
        if ($command == "Drive") {
            $bus->drive(floatval($commandTokens[2]));
        } else if ($command == "DriveEmpty") {
            $bus->setIsEmpty(true);
            $bus->drive(floatval($commandTokens[2]));
            $bus->setIsEmpty(false);
        } else if ($command == "Refuel") {
            $bus->refuel(floatval($commandTokens[2]));
        }
    }
}

$fuel_car = number_format($car->getFuel(), 2, '.', '');
$fuel_truck = number_format($truck->getFuel(), 2, '.', '');
$fuel_bus = number_format($bus->getFuel(), 2, '.', '');

echo "Car: {$fuel_car}\n";
echo "Truck: {$fuel_truck}\n";
echo "Bus: {$fuel_bus}\n";