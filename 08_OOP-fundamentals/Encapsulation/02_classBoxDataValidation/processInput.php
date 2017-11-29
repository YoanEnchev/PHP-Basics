<?php
include "Box.php";

$length = floatval(fgets(STDIN));
$width = floatval(fgets(STDIN));
$height = floatval(fgets(STDIN));

$box = new Box($length, $width, $height);
$surfaceArea = number_format($box->calcSurfaceArea(), 2, '.', '');
$lateralSurfaceArea = number_format($box->calcLateralSurfaceArea(), 2, '.', '');
$volume = number_format($box->calcVolume(), 2, '.', '');

echo "Surface Area – {$surfaceArea}\n";
echo "Lateral Surface Area – {$lateralSurfaceArea}\n";
echo "Volume - {$volume}\n";