<?php
include "interfaces/IcallPhones.php";
include "interfaces/IBrowsWeb.php";
include "classes/Smartphone.php";

$phones = explode(' ', trim(fgets(STDIN)));
$urls = explode(' ', trim(fgets(STDIN)));
$smartphone = new Smartphone();


foreach ($phones as $phone) {
    echo $smartphone->callPhone($phone);
}

foreach ($urls as $url) {
    echo $smartphone->browseWeb($url);
}

