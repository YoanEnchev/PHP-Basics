<?php
$input = array_map('intval', explode(' ', fgets(STDIN)));
$numberAndOccurance=array_count_values($input);//Counts the values in the array, returns associatve array
arsort($numberAndOccurance);//Sort it from highest to lowest

$result = array_keys($numberAndOccurance)[0];
echo $result;