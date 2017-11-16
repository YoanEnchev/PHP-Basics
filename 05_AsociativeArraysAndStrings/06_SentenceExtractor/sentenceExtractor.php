<?php
$text = " " . trim(fgetss(STDIN));
$word = trim(fgetss(STDIN));

preg_match_all("/.*?(\.|\!|\?)/", $text, $matches);
$sentences = $matches[0];

for ($i = 0; $i < count($sentences); $i++) {
    $wordsInSentence = str_word_count($sentences[$i], 1);
    if (in_array($word, $wordsInSentence)) { // check if sentence contains the word
        echo $sentences[$i] . "\n";
    }
}

