<?php
$word = trim(fgets(STDIN));
$letterAndOccurance =  array();

for ($i = 0; $i < strlen($word); $i++) {
    $letter = $word[$i];
    if (!array_key_exists($letter, $letterAndOccurance)) {
        $letterAndOccurance[$letter] = 0;
    }

    $letterAndOccurance[$letter]++;
}

array_multisort($letterAndOccurance, SORT_DESC);

foreach ($letterAndOccurance as $key => &$val) {
    echo  "{$key} -> {$val}\n";
}