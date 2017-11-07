<?php
$datetime1 = new DateTime('NOW'); //today
$yearNow = $datetime1->format("Y"); //get current year
$datetime2 = new DateTime("{$yearNow}-12-31"); //new year

//time left with days, hours and minutes.
$totalSeconds = $datetime2->getTimestamp() - $datetime1->getTimestamp(); //time left in seconds
$days    = floor($totalSeconds / 86400);
$hours   = floor(($totalSeconds - ($days * 86400)) / 3600);
$minutes = floor(($totalSeconds - ($days * 86400) - ($hours * 3600))/60);
$seconds = floor(($totalSeconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));

echo "<p>Days:Hours:Minutes:Seconds {$days}:${hours}:${minutes}:${seconds}</p>";
//total left time:
$days    = floor($totalSeconds / 86400);
$hours   = floor(($days) * 24);
$minutes = floor(($hours * 60));

echo "<p>Hours until new year : {$hours}</p>";
echo "<p>Minutes until new year : {$minutes}</p>";
echo "<p>Seconds until new year : {$totalSeconds}</p>";