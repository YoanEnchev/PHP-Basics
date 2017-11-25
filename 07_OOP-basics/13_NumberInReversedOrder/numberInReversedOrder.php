<?php
include ('DecimalNumber.php');

$input = floatval(fgets(STDIN));
$number = new DecimalNumber($input);
$number->printReversed();