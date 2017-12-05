<?php
include_once 'loadFiles.php';

$input = trim(fgets(STDIN));
$shipList = [];

while ($input != "over") {
    $tokens = explode(' ', $input);
    $command = $tokens[0];

    switch ($command) {
        case 'create': {
            $shipType = $tokens[1];
            $shipName = $tokens[2];
            $starSystem = $tokens[3];

            $nameTaken = checkIfNameItTaken($shipName, $shipList);
            if ($nameTaken) {
                echo 'Ship with such name already exists';
                continue;
            }

            $enchantments_count = sizeof($tokens) - 4;
            if($enchantments_count == 0) {
                $enchantments = [];
            }
            else {
                $enchantments = array_slice($tokens, -$enchantments_count);
            }

            $ship = new $shipType($shipName, $starSystem, $enchantments);
            array_push($shipList, $ship);

            break;
        }

        case 'attack': {
            $attackerName = $tokens[1];
            $attackedName = $tokens[2];

            $attacker = getShipByName($attackerName, $shipList);
            $attacked = getShipByName($attackedName, $shipList);

            $attacker->attack($attacked);
            break;
        }

        case 'plot-jump': {
            $shipName = $tokens[1];
            $starSystem = $tokens[2];

            $ship = getShipByName($shipName, $shipList);
            $ship->changeStarSystem($starSystem);
            break;
        }

        case 'status-report': {
            $shipName = $tokens[1];
            $ship = getShipByName($shipName, $shipList);
            $ship->statusReport();
            break;
        }

        case 'system-report':
            $galaxyName = $tokens[1];
            reportShipsInStarSystem($galaxyName, $shipList);
            break;
    }

    $input = trim(fgets(STDIN));
}


function checkIfNameItTaken(string $shipName, array $shipList): bool
{
    foreach ($shipList as $ship) {
        if ($ship->getName() == $shipName) {
            return true;
        }
    }

    return false;
}

function getShipByName(string $shipName, array $shipList): Starship
{
    foreach ($shipList as $ship) {
        if ($ship->getName() == $shipName) {
            return $ship;
        }
    }

    throw new Error("Ship with such name does not exist.");
}

function reportShipsInStarSystem(string $galaxyName, array $shipList)
{
    $aliveShips = [];
    $destroyedShips = [];

    foreach ($shipList as $ship) {
        if ($ship->getStarSystem() == $galaxyName) {
            if ($ship->isAlive()) {
                array_push($aliveShips, $ship);
            } else {
                array_push($destroyedShips, $ship);
            }
        }
    }

    usort($aliveShips, "sortByShields_descending"); //second criteria
    usort($aliveShips, "sortByHealth_descending"); //main criteria
    echo "Intact ships:\n";
    reportShipsInGroup($aliveShips);

    usort($aliveShips, "sortAlphabetically");
    echo "Destroyed ships:\n";
    reportShipsInGroup($destroyedShips);
}

function reportShipsInGroup(array $ships)
{
    if(sizeof($ships) == 0) {
        echo "N/A\n";
    } else {
        foreach ($ships as $ship) {
            $ship->statusReport();
        }
    }
}

function sortByShields_descending(Starship $a, Starship $b)
{
    return $a->getName() < $b->getName();
}

function sortByHealth_descending(Starship $a, Starship $b)
{
    return $a->getName() < $b->getName();
}

function sortAlphabetically(Starship $a, Starship $b)
{
    return strcmp($a->getName(), $b->getName());
}
