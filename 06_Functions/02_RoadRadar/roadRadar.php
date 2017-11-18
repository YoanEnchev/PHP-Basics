<?php
$speed = intval(fgetss(STDIN));
$area = trim(fgetss(STDIN));

$maxSpeed = determineMaxSpeed($area);
printIfOverLimit($speed, $maxSpeed);

function determineMaxSpeed($area)
{
    switch ($area) {
        case 'city':
            return 50;
        case 'residential':
            return 20;
            break;
        case 'interstate':
            return 90;
            break;
        case 'motorway':
            return 130;
            break;
        default:
            return 'invalid area';
    }
}

function printIfOverLimit($speed, $maxSpeed)
{
    $speedOverlimit = $speed - $maxSpeed;

    if($speedOverlimit > 0) {

        if ($speedOverlimit <= 20) {
            echo 'speeding';
        }
        else if ($speedOverlimit <= 40) {
            echo  'excessive speeding';
        }
        else {
            echo 'reckless driving';
        }
    }
}
