<?php
$input = array_map('intval', explode(' ', fgets(STDIN)));
$equalSums = false;

for($i = 0; $i < count($input); $i++) {
    $leftSum = 0;
    for ($p = 0; $p < $i; $p++) {
        $leftSum += $input[$p];
    }

    $rightSum = 0;
    for ($p = $i + 1; $p < count($input); $p++) {
        $rightSum += $input[$p];
    }

    if($leftSum == $rightSum) {
        echo $i;
        $equalSums = true;
    }
}

if(!$equalSums) {
    echo 'no';
}