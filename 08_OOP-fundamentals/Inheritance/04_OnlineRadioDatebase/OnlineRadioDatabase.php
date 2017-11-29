<?php
include "Song.php";

$n = intval(fgets(STDIN));
$songList = [];
$secondsInPlaylist = 0;

for ($i = 0; $i < $n; $i++) {
    $input = trim(fgetss(STDIN));
    list($artist, $name, $length) = explode(';', $input);

    $song = new Song($artist, $name, $length);

    if ($song->getValidity()) {
        array_push($songList, $song);
        $secondsInPlaylist += getTotalSecondsFromLength($length);
        echo "Song added.\n";
    }
}

$songCount = sizeof($songList);
echo "Songs added: {$songCount}\n";
printHourMinutesSeconds($secondsInPlaylist);


function getTotalSecondsFromLength($length): int
{
    $tokens = explode(':', $length);
    list($minutes, $seconds) = array_map('intval', $tokens);

    return $minutes * 60 + $seconds;
}

function printHourMinutesSeconds($secondsInPlaylist): void
{
    $hours = floor($secondsInPlaylist / 3600);
    $minutes =floor(($secondsInPlaylist - $hours * 3600) / 60);
    $seconds = $secondsInPlaylist - 3600 * $hours - 60 * $minutes;

    if ($minutes < 10) {
        $minutes = "0" . $minutes;
    }

    if ($seconds < 10) {
        $seconds = "0" . $seconds;
    }

    echo "Playlist length: {$hours}h {$minutes}m {$seconds}s";
}