<?php
$host = 'localhost';
$user = 'root';
$passw = '';
$database = 'koeien';

$con = mysqli_connect($host, $user, $passw, $database);
if ($con) {
    echo 'verbinding';
} else {
    echo 'geen verbinding';
}
?>