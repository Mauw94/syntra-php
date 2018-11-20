<?php
$host = "localhost";
$user = "mauwsoft";
$passwd = "test123";
$db = "namefake";
$connection = true;

if ($con = mysqli_connect($host, $user, $passwd, $db)) {
    return $connection = true;
} else {
    echo mysqli_error();
    return $connection = false;
}
?>