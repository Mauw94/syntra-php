<?php
$host = "localhost";
$user = "root";
$passwd = "";
$db = "namefake";
$connection = true;

if ($con = mysqli_connect($host, $user, $passwd, $db)) {
    return $connection = true;
} else {
    echo mysqli_error();
    return $connection = false;
}
?>