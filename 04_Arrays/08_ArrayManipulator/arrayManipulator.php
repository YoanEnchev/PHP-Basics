<?php
$array = array_map('intval', explode(' ', fgets(STDIN)));

while (true) {
    $commands = explode(' ', trim(fgets(STDIN)));

    switch ($commands[0]) {
        case 'add':
            add($array, $commands);
            break;
        case 'addMany':
            addMany($array, $commands);
            break;
        case 'contains':
            containIndex($array, $commands);
            break;
        case 'remove':
            removeAtIndex($array, $commands);
            break;
        case 'shift':
            shiftArray($array, $commands);
            break;
        case 'sumPairs':
            sumPairs($array);
            break;
        case "print":
            printAndEnd($array);
            break;
    }

}

function add(&$array, $commands)
{
    $index = $commands[1];
    $element = $commands[2];
    array_splice($array, $index, 0, $element);
}

function addMany(&$array, $commands)
{
    $index = intval($commands[1]);
    $elementsToAdd = array_slice($commands, 2, sizeof($commands) - 1);
    $elementsToAdd = array_reverse($elementsToAdd);

    if ($index > sizeof($array)) {
        $index = sizeof($array);
    }
    for ($i = 0; $i < sizeof($elementsToAdd); $i++) {
        array_splice($array, $index, 0, $elementsToAdd[$i]);
    }

}

function containIndex(&$array, $commands)
{
    if (in_array($commands[1], $array)) {
        echo array_search($commands[1], $array);
    } else {
        echo -1;
    }
}

function removeAtIndex(&$array, $commands)
{
    $index = $commands[1];
    array_splice($array, $index, 1);
}

function shiftArray(&$array, $commands)
{
    $rotationCount = $commands[1] % count($array);

    for ($i = 0; $i < $rotationCount; $i++) {
        $firstElement = array_shift($array);
        array_push($array, $firstElement);
    }
}

function sumPairs(&$array) {
    $newArray = [];

    for ($i = 0; $i < count($array) - 1; $i += 2) {
        $newElement = $array[$i] + $array[$i + 1];
        array_push($newArray, $newElement);
    }

    if(sizeof($array) % 2 == 1) {
        array_push($newArray, $array[sizeof($array) - 1]);
    }

    $array = $newArray;
}

function printAndEnd($array)
{
    $result = implode(', ', $array);
    echo '[' . $result . ']';
    exit;
}