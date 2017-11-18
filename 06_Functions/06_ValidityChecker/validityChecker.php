<?php
$input = trim(fgetss(STDIN));
list($x1, $y1, $x2, $y2) = array_map('intval', explode(', ',$input));
calcDistanceAndPrintIfValid($x1, $y1, 0, 0);
calcDistanceAndPrintIfValid($x2, $y2, 0, 0);
calcDistanceAndPrintIfValid($x1, $y1, $x2, $y2);

function calcDistanceAndPrintIfValid($x1, $y1, $x2, $y2) {
    $side_x = abs($x1 - $x2);
    $side_y = abs($y1 - $y2);
    $distance = sqrt($side_x * $side_x + $side_y * $side_y);

    if($distance == intval($distance)) { // valid
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is valid\n";
    }
    else {
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is invalid\n";
    }
}