<?php
include "FoodFacrory.php";
include "MoodFactory.php";

$food_input = trim(fgets(STDIN));
$foodList = explode(',', $food_input);

$food = new FoodFacrory();

foreach ($foodList as $currentFood) {
    $food->addFood($currentFood);
}

$mood = new MoodFactory();
$mood->processFood($food->getFoodList());
echo $mood->getMoodPoints(). "\n";
echo $mood->getMoodStatus();

