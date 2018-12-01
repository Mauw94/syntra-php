<?php

$host = "localhost";
$user = "root";
$passwd = "";
$db = "poe-map";

if ($con = mysqli_connect($host, $user, $passwd, $db)) {
    return true;
} else {
    return false;
}