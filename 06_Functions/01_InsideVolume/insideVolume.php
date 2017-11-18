<?php
$coordinates = explode(', ', fgetss(STDIN));
$x = $coordinates[0];
$y = $coordinates[1];
$z = $coordinates[2];

if(isVolume($x, $y, $z)) {
    echo 'inside';
}
else {
    echo 'outside';
}

function isVolume($x, $y, $z) {
    $x1 = 10; $x2 = 50;
    $y1 = 20; $y2 = 80;
    $z1 = 15; $z2 = 50;

    if($x >= $x1 && $x <= $x2) {
        if($y >= $y1 && $y <= $y2) {
            if($z >= $z1 && $z <= $z2) {
                return true;
            }
        }
    }

    return false;
}