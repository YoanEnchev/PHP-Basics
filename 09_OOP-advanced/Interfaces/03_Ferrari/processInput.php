<?php
include "interfaces/ICar.php";
include "classes/Ferrari.php";

$owner = trim(fgets(STDIN));
$ferrari = new Ferrari($owner);
echo $ferrari;