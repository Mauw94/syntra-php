<?php

$host = "localhost";
$user = "root";
$passwd = "";
$db = "seelen_sol";
$connected = "Connected to the database.";

if ($con = mysqli_connect($host, $user, $passwd, $db)) {
    return $connected;
} else {
    return mysqli_error($con);
}

?>