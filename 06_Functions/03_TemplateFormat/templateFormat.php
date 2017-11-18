<?php
$questions_answers = explode(', ',  trim(fgetss(STDIN)));
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<quiz>' . "\n";

for ($i = 0; $i < sizeof($questions_answers); $i++) {
    if($i % 2 == 0) {
        echo "    <question>\n";
        echo "  {$questions_answers[$i]}\n";
        echo "    </question>\n";
    }
    else {
        echo "    <answer>\n";
        echo "  {$questions_answers[$i]}\n";
        echo "    </answer>\n";
    }
}

echo '</quiz>';