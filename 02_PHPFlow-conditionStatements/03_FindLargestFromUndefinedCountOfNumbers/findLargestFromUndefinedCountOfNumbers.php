<?php
$numbers = [];
while(true) {
    $line = trim(fgets(STDIN));

    if(empty($line)) {
        break;
    }
    array_push($numbers, $line);
}

echo max($numbers);