<?php
$input = intval(fgetss(STDIN));
$digits = str_split($input);

while(true) {
    $digitAverage = array_sum($digits) / sizeof($digits);

    if($digitAverage <= 5) {
        array_push($digits, 9);
    }
    else {
        break;
    }
}

echo join('', $digits);