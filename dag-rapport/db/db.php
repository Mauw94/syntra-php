<?php
$host = "localhost";
$user = "root";
$passwd = "";
$db = "dag-rapport";

$con = mysqli_connect($host, $user, $passwd, $db);
if (!$con) {
    return mysqli_error($con);
}     

?>