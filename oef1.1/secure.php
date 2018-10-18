<?php
session_start();
if ($_SESSION['login'] == "ok") {
    echo 'gevoelige informatie';
    print_r($_SESSION);
} else {
    echo 'niet ingelogd';
}
?>