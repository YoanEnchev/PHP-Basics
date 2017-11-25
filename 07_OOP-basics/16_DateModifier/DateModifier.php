<?php

class DateModifier
{
    public function calcDayDifference(string $date_1, string $date_2)
    {
        $date_1_tokens = array_map('intval', explode(' ', $date_1));
        $date_2_tokens = array_map('intval', explode(' ', $date_2));

        $date_1 = strtotime("{$date_1_tokens[0]}-{$date_1_tokens[1]}-{$date_1_tokens[2]}");
        $date_2 = strtotime("{$date_2_tokens[0]}-{$date_2_tokens[1]}-{$date_2_tokens[2]}");
        $datediff = $date_1 - $date_2;

        return abs(floor($datediff / (60 * 60 * 24)));
    }
}