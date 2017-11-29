<?php
include "classes/Cat.php";
include "classes/Siamese.php";
include "classes/Cymric.php";
include "classes/StreetExtraordinaire.php";

$input = trim(fgets(STDIN));
$catList = [];

while ($input != "End") {
    $tokens = explode(' ', $input);
    $type = $tokens[0];
    $name = $tokens[1];
    $specific = intval($tokens[2]);

    switch ($type) {
        case 'Siamese':
            $cat = new Siamese($name, $specific);
            break;
        case 'Cymric':
            $cat = new Cymric($name, $specific);
            break;
        case 'StreetExtraordinaire':
            $cat = new StreetExtraordinaire($name, $specific);
            break;
        default:
            $cat = new Cat($name);
    }

    array_push($catList, $cat);
    $input = trim(fgets(STDIN));
}

$searchName = trim(fgets(STDIN));
echo findCatByName($catList ,$searchName);


function findCatByName($catList ,$searchName)
{
    foreach ($catList as $cat) {
        if($cat->getName() == "$searchName") {
            return $cat;
        }
    }

    return "Not found cat with such name";
}
