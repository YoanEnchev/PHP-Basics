<?php
$text = trim(fgetss(STDIN));
$banList = explode(', ', trim(fgetss(STDIN)));

for ($i = 0; $i < sizeof($banList); $i++) {
    $censor = str_repeat("*",strlen($banList[$i]));
    $text = str_replace($banList[$i], $censor, $text);
}

echo $text;