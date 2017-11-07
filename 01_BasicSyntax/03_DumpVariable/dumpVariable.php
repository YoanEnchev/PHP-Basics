<?php
$arr = ["hello", 15, 1.234, array(1, 2, 3), (object)[2,34]];

for ($i = 0; $i < count($arr); $i++){
    printTypeOrValue($arr[$i]);
}

function printTypeOrValue($variable) {
    $type = gettype($variable);

    if(is_numeric($variable)){
        echo "{$type}($variable)";
    }
    else{
        echo $type;
    }

    echo "<br>";
}