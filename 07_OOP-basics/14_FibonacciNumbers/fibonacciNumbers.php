<?php
include 'Fibonacci.php';

$start = intval(fgets(STDIN));
$end = intval(fgets(STDIN));

$fibonacciSequence = new Fibonacci();
$fibonacciSequence->printNumbersBetweenIndexes($start, $end);