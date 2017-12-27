<?php

$db_host = "<your host>";
$db_name = "<your DB name>";
$db_user = "<your username>";
$db_password = '<your password>';
$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
