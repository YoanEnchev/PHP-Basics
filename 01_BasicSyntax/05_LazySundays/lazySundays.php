<?php
$now = new \DateTime('now');
$month = $now->format('m');
$year = $now->format('Y');


$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
for($i = 1; $i<= $days; $i++){
    $day  = date('Y-m-'.$i);
    $result = date("l", strtotime($day));
    if($result == "Sunday"){
        echo date("jS F, y", strtotime($day)) ."<br>";
    }
}