<?php
$rows = intval(fgets(STDIN));
$letters = str_split('ATCGTTAGGG');

$row_template = 1;
$letter_index = 0;

for ($i = 0; $i < $rows; $i++) {
    $letter_1 = $letters[$letter_index];
    $letter_2 = $letters[$letter_index + 1];

    switch ($row_template) {
        case 1:
            echo "**{$letter_1}{$letter_2}**\n";
            break;
        case 2:
            echo "*{$letter_1}--{$letter_2}*\n";
            break;
        case 3:
            echo "{$letter_1}----{$letter_2}\n";
            break;
        case 4:
            echo "*{$letter_1}--{$letter_2}*\n";
            break;
    }

    $letter_index += 2;

    if($letter_index == 10) {
        $letter_index = 0;
    }

    $row_template++;

    if($row_template == 5) {
        $row_template = 1;
    }
}