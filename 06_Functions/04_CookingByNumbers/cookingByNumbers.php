<?php
$number = floatval(fgetss(STDIN));
$commands = explode(', ', trim(fgetss(STDIN)));

for ($i = 0; $i < sizeof($commands); $i++) {
    modifyNumber($number, $commands[$i]);
    echo $number . "\n";
}

function modifyNumber(&$number, $operation) {
    switch ($operation) {
        case 'chop':
            $number /= 2;
            break;
        case 'dice':
            $number = sqrt($number);
            break;
        case 'spice':
            $number++;
            break;
        case 'bake':
            $number *= 3;
            break;
        case 'fillet':
            $number -= $number * 20 / 100;
            break;
    }
}