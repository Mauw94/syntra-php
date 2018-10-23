<?php
$host = 'localhost';
$user = 'root';
$passw = '';
$database = 'koeien';
$verbinding = false;

$con = mysqli_connect($host, $user, $passw, $database);
if ($con) {
    $verbinding = true;
} else {
    echo 'geen verbinding';
    $verbinding = false;
}
?>