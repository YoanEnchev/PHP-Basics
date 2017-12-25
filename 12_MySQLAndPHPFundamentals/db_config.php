<?php

$db_host = "<db host>";
$db_name = "<db name>";
$db_user = "<username>";
$db_password = '<db pass>';
$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
