<?php
$input = array_map('intval', explode(' ', fgets(STDIN)));
$longestSequence = [];
$currentSequence = [$input[0]];

for ($i = 0; $i < sizeof($input) - 1; $i++) {
    $currentElement = $input[$i];
    $nextElement = $input[$i + 1];

    if ($currentElement < $nextElement) {
        array_push($currentSequence, $nextElement);
    } else {
        $currentSequence = [$nextElement];
    }

    if (sizeof($currentSequence) > sizeof($longestSequence)) {
        $longestSequence = $currentSequence;
    }
}

echo implode(' ', $longestSequence);