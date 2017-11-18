<?php
$input =explode(', ', trim(fgets(STDIN)));
$tokens = array_map('floatval', $input);
$desiredSize = $tokens[0];

for ($i = 1; $i < sizeof($tokens); $i++) {
    $crystalSize = $tokens[$i];
    echo "Processing chunk {$crystalSize} microns\n";

    if ($crystalSize != $desiredSize) {
        performOperations($crystalSize, $desiredSize);
    }

    echo "Finished crystal {$desiredSize} microns\n";
}

function performOperations($crystalSize, $desiredSize)
{
    $cut_count = 0;
    $lap_count = 0;
    $grind_count = 0;
    $etch_count = 0;

    while ($crystalSize / 4 >= $desiredSize - 1) {
        $crystalSize /= 4;
        $cut_count++;
    }
    printOperationAndWash('Cut', $cut_count, $crystalSize);

    while ($crystalSize - $crystalSize / 5 >= $desiredSize - 1) {
        $crystalSize -= $crystalSize / 5;
        $lap_count++;
    }

    printOperationAndWash('Lap', $lap_count, $crystalSize);

    while ($crystalSize - 20 >= $desiredSize - 1) {
        $crystalSize -= 20;
        $grind_count++;
    }

    printOperationAndWash('Grind', $grind_count, $crystalSize);

    while ($crystalSize - 2 >= $desiredSize - 1) {
        $crystalSize -= 2;
        $etch_count++;
    }

    printOperationAndWash('Etch', $etch_count, $crystalSize);

    if($crystalSize  == $desiredSize - 1) {
        $crystalSize++;
        printOperationAndWash('X-ray', 1, $crystalSize);
    }
}

function printOperationAndWash($operation, $count, &$crystalSize)
{
    if($count > 0) {
        echo "{$operation} x{$count}\n";
        echo "Transporting and washing\n";
        $crystalSize = floor($crystalSize);
    }
}
