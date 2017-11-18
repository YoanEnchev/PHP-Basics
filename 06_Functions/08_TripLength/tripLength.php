<?php
$coordinates = explode(', ', fgets(STDIN));
list($x1, $y1, $x2, $y2, $x3, $y3) = array_map('floatval', $coordinates);
$distance_1And2 = calcDistance($x1, $y1, $x2, $y2);
$distance_1And3 = calcDistance($x1, $y1, $x3, $y3);
$distance_2And3 = calcDistance($x2, $y2, $x3, $y3);

$smallestDistance = min([$distance_1And2, $distance_1And3, $distance_2And3]);

if($smallestDistance == $distance_1And2) {
    if($distance_1And3 < $distance_2And3) {
        $distance = $distance_1And2 + $distance_1And3;
        echo '2->1->3'.": {$distance}";
    }
    else {
        $distance = $distance_1And2 + $distance_2And3;
        echo '1->2->3'.": {$distance}";
    }
}

else if($smallestDistance == $distance_1And3) {
    if($distance_1And2 < $distance_2And3) {
        $distance = $distance_1And3 + $distance_1And2;
        echo '2->1->3'.": {$distance}";
    }
    else {
        $distance = $distance_1And3 + $distance_2And3;
        echo '1->3->2'.": {$distance}";
    }
}

else if($smallestDistance == $distance_2And3) {
    if($distance_1And2 < $distance_1And3) {
        $distance = $distance_1And2 + $distance_2And3;
        echo '1->2->3'.": {$distance}";
    }
    else {
        $distance = $distance_1And3 + $distance_2And3;
        echo '1->3->2'.": {$distance}";
    }
}



function calcDistance($x1, $y1, $x2, $y2)
{
    $side_x = abs($x1 - $x2);
    $side_y = abs($y1 - $y2);
    $distance = sqrt($side_x * $side_x + $side_y * $side_y);
    return $distance;
}