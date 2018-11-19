<?php
$host = "localhost";
$user = "root";
$passwd = "";
$db = "examenBA1";

// connectie met de database maken
if ($con = mysqli_connect($host, $user, $passwd, $db)) {
    return TRUE;
} else {
    echo "something went wrong";
}
?>