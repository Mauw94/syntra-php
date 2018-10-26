<?php
include 'database.php';
include 'koe.php';
$add = false;
$koe = new Koe();
$koe->setNaam(strtolower($_POST['naam']));
$koe->setLitersMelk($_POST['melk']);
$koe->setDatumIngave($_POST['date']);
$koe->setOpmerking($_POST['opmerking']);

$naam = $koe->getNaam();
$melk = $koe->getLitersMelk();
$datum = $koe->getDatumIngave();
$opmerking = $koe->getOpmerking();

if (dateCheck($koe->getDatumIngave())) {
    $sql = "INSERT INTO koe VALUES(NULL, '$naam', '$melk', '$datum', '$opmerking')";
    if (mysqli_query($con, $sql)) {
        echo '<br> added!';
        ?>
    <meta http-equiv="refresh" content="1; URL='index.php'"/>
    <?php 
    } else {
        '<br> fout bij toevoeging';
    }
}

function dateCheck($date)
{
    $today = date("Y-m-d");
    $date = date($date);

    if ($date > $today) {        
        echo '<br> error: datum is in de toekomst';
        return false;
    } else {
        return true;
    }
}

?>