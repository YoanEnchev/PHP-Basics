<?php
include('DateModifier.php');

$date_1 = trim(fgets(STDIN));
$date_2 = trim(fgets(STDIN));

$dateModifier = new DateModifier();
echo $dateModifier->calcDayDifference($date_1, $date_2);
