<?php
$input = fgets(STDIN);
$letter_index = [];
$input = strtolower($input);

for ($i = 0; $i < strlen($input); $i++) {
    $letter = $input[$i];
    $index = ord($letter) - 97;

    if ($index >= 0 && $index <= 25) {
        $result = "$letter -> $index";
        array_push($letter_index, $result);
    }
}

echo join("\n", array_unique($letter_index));
