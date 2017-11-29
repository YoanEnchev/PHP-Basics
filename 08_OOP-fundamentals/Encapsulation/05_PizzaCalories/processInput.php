<?php
include "Dough.php";
include "Pizza.php";
include "Topping.php";

$input = trim(fgets(STDIN));

while ($input != "END") {
    $tokens = explode(' ', $input);
    $engridient = $tokens[0];

    if ($engridient == "Dough") {
        $floorType = $tokens[1];
        $technique = $tokens[2];
        $weight = floatval($tokens[3]);

        $dough = new Dough($floorType, $technique, $weight);
        $pizza->setDough($dough);
    }

    else if ($engridient == "Topping") {
        $toppingType = $tokens[1];
        $weight = floatval($tokens[2]);

        $topping = new Topping($toppingType, $weight);
        $pizza->addTopping($topping);
    }

    else if($engridient == "Pizza") {
        $name = $tokens[1];
        $numberOfToppings = intval($tokens[2]);

        $pizza = new Pizza($name, $numberOfToppings);
    }

    $input = trim(fgets(STDIN));
}

echo $pizza;