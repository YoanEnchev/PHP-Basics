<?php
$arr_1 = explode(' ', fgets(STDIN));
$arr_2 = explode(' ', fgets(STDIN));

$leftCommon = scanArrayLeftToRight($arr_1, $arr_2);
$arr_1 = array_reverse($arr_1);
$arr_2 = array_reverse($arr_2);
$rightCommon = scanArrayLeftToRight($arr_1, $arr_2);

if($leftCommon > $rightCommon) {
    echo $leftCommon;
}
else {
    echo $rightCommon;
}

function scanArrayLeftToRight($arr_1, $arr_2)
{
    $common = 0;
    $smallerSize = min(sizeof($arr_1), sizeof($arr_2));

    for ($i = 0; $i < $smallerSize; $i++) {
        if ($arr_1[$i] != $arr_2[$i]) {
            break;
        }

        $common++;
    }

    return $common;
}
