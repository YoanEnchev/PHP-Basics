<?php
$n = 145;
$uniqueDigits = [];

for ($i = 0; $i < $n; $i++) {
    $digits = str_split($n);

    if (array_unique($digits) && count($digits) > 2) {
        array_push($uniqueDigits,$i);
    }
}

if(count($uniqueDigits) == 0) {
    echo 'none';
}
else{
    echo join(", ",$uniqueDigits);
}