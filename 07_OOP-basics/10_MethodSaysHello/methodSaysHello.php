<?php
include ('Person.php');

$name = trim(fgets(STDIN));
$person = new Person($name);

$fields = count(get_object_vars($person));
$methods = count(get_class_methods($person));
if ($fields != 1 || $methods != 2) {
    throw new Exception("Too many fields or methods");
}
else {
    echo $person->saysHello();
}
