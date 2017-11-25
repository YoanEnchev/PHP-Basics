<?php
include 'Number.php';

$n = intval(fgets(STDIN));
$number = new Number($n);
echo $number->lastDigitAsWords();