<?php
$host = 'localhost';
$user = 'root';
$passwd = '';
$db = 'travel';

$con = mysqli_connect($host, $user, $passwd, $db);
if ($con) {
    echo 'connected<br>';
} else {
    echo 'not connected<br>';
}
?>