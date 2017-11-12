<?php
$arr = array_map('intval', explode(' ', fgets(STDIN)));
$longest_element = $arr[0];
$longest_length = 1;

$current_length = 1;
$current_element = $arr[0];

for ($i = 0; $i < sizeof($arr) - 1; $i++) {
    $current_element = $arr[$i];

    if($current_element == $arr[$i + 1]) {
        $current_length++;
    }
    else {
        $current_length = 1;
    }

    if($current_length > $longest_length) {
        $longest_length = $current_length;
        $longest_element = $current_element;
    }
}

$result = array_fill(0, $longest_length, $longest_element);
echo implode(' ', $result);