<?php
$arr = array_map('intval', explode(' ', fgets(STDIN)));
$repeat = intval(fgets(STDIN));
$summedElements = array_fill(0, sizeof($arr), 0);

for ($i = 0; $i < $repeat; $i++) {
    $element = array_pop($arr);
    array_unshift($arr, $element);

    for ($p = 0; $p < sizeof($arr); $p++) {
        $summedElements[$p] += $arr[$p];
    }
}

echo implode(' ', $summedElements);
