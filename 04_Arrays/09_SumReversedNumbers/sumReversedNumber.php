<?php
$input = trim(fgets(STDIN));
$reversed = explode(' ', strrev($input));

$reversed_int = array_map('intval', $reversed);
echo array_sum($reversed_int);