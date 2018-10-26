<?php
include 'database.php';
include 'broodje.php';

$broodje = new Broodje();
$broodje->setSoort($_POST['soort']);
$broodje->setGroeten($_POST['groenten']);
$broodje->setBrood($_POST['brood']);
$broodje->setSaus($_POST['saus']);
$broodje->setAantal($_POST['aantal']);

echo $broodje->__toString();
?>