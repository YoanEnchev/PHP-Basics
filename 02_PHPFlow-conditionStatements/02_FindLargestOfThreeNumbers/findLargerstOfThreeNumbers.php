<?php
$num_1 = intval(fgets(STDIN));
$num_2 = intval(fgets(STDIN));
$num_3 = intval(fgets(STDIN));
$largest = max($num_1, $num_2, $num_3);
echo $largest;