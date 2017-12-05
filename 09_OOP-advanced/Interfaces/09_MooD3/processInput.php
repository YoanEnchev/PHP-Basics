<?php
include 'interfaces/ICharacter.php';
include 'classes/Character.php';
include 'classes/Archangel.php';
include 'classes/Demon.php';

$input = trim(fgets(STDIN));
$tokens = explode(' | ', $input);
$className = $tokens[1];

$character = new $className($tokens[0], floatval($tokens[2]), intval($tokens[3]));
echo $character;