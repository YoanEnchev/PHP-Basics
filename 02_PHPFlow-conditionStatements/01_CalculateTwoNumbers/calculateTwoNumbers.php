<?php
$operation = $argv[1];

$num_1 = intval($argv[2]);
$num_2 = intval($argv[3]);

if($operation == "sum") {
    echo " == " . ($num_1 + $num_2);
}
else if ($operation == "subtract") {
    echo " == " . ($num_1 - $num_2);
}
else {
    echo " == Wrong operation suplied";
}