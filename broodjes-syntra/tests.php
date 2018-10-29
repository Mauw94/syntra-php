<?php
include 'database.php';
include 'head.php';
include 'navigate.php';
include 'klant.php';

$klant = new Klant();
echo $klant->checkOrder($con);
?>