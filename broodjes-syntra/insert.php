<?php
include 'database.php';
include 'broodje.php';
include 'klant.php';
include 'orders.php';

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

# increment order
# update order for customer and bread and orders table
$orders = new Orders($con);
$besterlNr = $orders->getBestelNr();

if ($klant->canOrder($con, $email)) {
    $sqlKlant = "INSERT INTO klant VALUES(NULL, '$naam', '$tel', '$email', '$besterlNr')";
    if (mysqli_query($con, $sqlKlant)) {
         $klant->emailVerification();
        echo 'E-mail verification sent.';
    } else {
        echo 'error adding klant<br>';
    }

    $sql = "INSERT INTO broodje VALUES (NULL, 0, '$soort', '$brood', '$groenten', '$saus', '$aantal', '$bestelDatum', 'FALSE', '$besterlNr')";
    if (mysqli_query($con, $sql)) {
        echo 'added broodje <br>'; ?>
        <meta http-equiv="refresh" content="1; URL='input.php'"/>
    <?php } else {
        echo '<br>error adding broodje';
    }
} else {
    echo 'You already ordered something today.';
    ?> <meta http-equiv="refresh" content="2; URL='input.php'"/> <?php
}

?>