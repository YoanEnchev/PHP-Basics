<?php
$input = explode(', ', fgetss(STDIN));
$coordinates = array_map('floatval', $input);

for ($i = 0; $i < sizeof($coordinates) - 1; $i += 2) {
    $x = $coordinates[$i];
    $y = $coordinates[$i + 1];
    determineLocation($x, $y);
}

function determineLocation($x, $y)
{
    if ($x >= 1 && $x <= 3 && $y >= 1 && $y <= 3) {
        echo "Tuvalu\n";
    }
    else if ($x >= 8 && $x <= 9 && $y >= 0 && $y <= 1) {
        echo "Tokelau\n";
    }
    else if ($x >= 5 && $x <= 7 && $y >= 3 && $y <= 6) {
        echo "Samoa\n";
    }
    else if ($x >= 0 && $x <= 2 && $y >= 6 && $y <= 8) {
        echo "Tonga\n";
    }
    else if ($x >= 5 && $x <= 9 && $y >= 7 && $y <= 8) {
        echo "Cook\n";
    }
    else {
        echo "On the bottom of the ocean\n";
    }
}