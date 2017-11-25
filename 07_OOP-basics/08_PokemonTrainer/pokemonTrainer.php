<?php
include('Trainer.php');
include('Pokemon.php');

$pokemonCatch = trim(fgets(STDIN));
$trainers = [];

while ($pokemonCatch != "Tournament") {
    $tokens = explode(' ', $pokemonCatch);
    $trainerName = $tokens[0];
    $pokemonName = $tokens[1];
    $element = $tokens[2];
    $health = intval($tokens[3]);

    $pokemon = new Pokemon($pokemonName, $element, $health);

    addPokemonToTrainer($trainerName, $pokemon, $trainers);
    $pokemonCatch = trim(fgets(STDIN));
}

$element = trim(fgets(STDIN));
while ($element != "End") {
    tournament($element, $trainers);
    $element = trim(fgets(STDIN));
}

usort($trainers, "sortByBadges");
printTrainers($trainers);


function tournament($element, &$trainers) {

    foreach ($trainers as $trainer) {
        $trainerHasElement = false;
        $trainerPokemonList =  $trainer->pokemon;

        foreach ($trainerPokemonList as $pokemon) {
            //trainer has pokemon with needed element:
            if($pokemon->element == $element) {
                $trainerHasElement = true;
                break;
            }
        }

        if($trainerHasElement) {
            $trainer->badges++;
        }
        else {
            $trainer->pokemon = array_map('lose10Health', $trainerPokemonList);
        }

        $trainer->pokemon = array_filter($trainer->pokemon, "removeDeadPokemon");
    }
}

function addPokemonToTrainer($trainerName, $pokemon, &$trainers): void
{
    foreach ($trainers as $trainer) {
        //add pokemon to existing trainer:
        if ($trainer->name == $trainerName) {
            array_push($trainer->pokemon, $pokemon);
            return;
        }
    }
    //initialize new trainer with single pokemon:
    $newTrainer = new Trainer($trainerName);
    $newTrainer->pokemon = [$pokemon];
    array_push($trainers, $newTrainer);
}

function lose10Health($pokemon) {
    $pokemonLostHp = $pokemon;
    $pokemonLostHp->health -= 10;
    return $pokemonLostHp;
}

function removeDeadPokemon(Pokemon $pokemon) {
    if($pokemon->health <= 0) {
        return false;
    }

    return true;
}

function sortByBadges(Trainer $trainer_1, Trainer $trainer_2)
{
    return $trainer_2->badges - $trainer_1->badges;
}

function printTrainers($trainers)
{
    foreach ($trainers as $trainer) {
        $numberOfPokemon = count($trainer->pokemon);
        echo "{$trainer->name} {$trainer->badges} {$numberOfPokemon}\n";
    }
}
