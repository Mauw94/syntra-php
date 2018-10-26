<?php
include 'database.php';
include 'broodje.php';
include 'klant.php';

$klant = new Klant();
$broodje = new Broodje();
$broodje->setSoort($_POST['soort']);
$broodje->setGroeten($_POST['groenten']);
$broodje->setBrood($_POST['brood']);
$broodje->setSaus($_POST['saus']);
$broodje->setAantal($_POST['aantal']);
$broodje->setBestelDatum($today = date("Y-m-d"));

$soort = $broodje->getSoort();
$groenten = $broodje->getGroeten();
$brood = $broodje->getBrood();
$saus = $broodje->getSaus();
$aantal = $broodje->getAantal();
$bestelDatum = $broodje->getBestelDatum();

$klant->setNaam($_POST['naam']);
$klant->setTel($_POST['tel']);
$klant->setEmail($_POST['email']);

$naam = $klant->getNaam();
$tel = $klant->getTel();
$email = $klant->getEmail();

$sqlKlant = "INSERT INTO klant VALUES(NULL, '$naam', '$tel', '$email')";
if (mysqli_query($con, $sqlKlant)) {
    echo 'added klant<br>';
} else {
    echo 'error adding klant<br>';
}

$sql = "INSERT INTO broodje VALUES (NULL, 0, '$soort', '$brood', '$groenten', '$saus', '$aantal', '$bestelDatum')";
if (mysqli_query($con, $sql)) {
    echo 'added broodje <br>'; ?>
    <meta http-equiv="refresh" content="1; URL='input.php'"/>
<?php } else {
    echo '<br>error adding broodje';
}
?>