<?php
$input = Trim(fgets(STDIN));
$numbers = explode(' ', $input);

$numberAndOccurrence = array_count_values($numbers);
ksort($numberAndOccurrence);

foreach ($numberAndOccurrence as $key => $value) {
    echo "{$key} -> {$value} times\n";
}