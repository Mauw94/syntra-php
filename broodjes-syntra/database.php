<?php
$host = 'localhost';
$user = 'root';
$passwd = '';
$database = 'broodjes-syntra';
$connection = false;

$con = mysqli_connect($host, $user, $passwd, $database);
if ($con) {
    $connection = true;
} else {
    echo 'can not connect';
    $connection = false;
}
?>