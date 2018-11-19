<?php
include "conn.php";
include "processor.php";
include "navigate.php";
/*
* nieuwe instantie van een processor object
* berekend The Lucky Number
* laat een felicitatie zien
* slaat de ingave op in de db
*/
$processor = new Processor($con);

/*
* controleert of alle ingaves erzijn
* controleert of het een getal is en kleiner is dan 10
* roept vervolgens alle methoden van de Processor klasse aan
*/
if (isset($_POST['geluksgetal']) && isset($_POST['naam']) && isset($_POST['voornaam'])) {
    $getal = $_POST['geluksgetal'];
    $naam = $_POST['naam'];
    $voornaam = $_POST['voornaam'];
    if (is_numeric($getal) && $getal <= 10) {
        $geluksgetal = $processor->calculateLuckyNumber($getal);
        echo "ingave: " . $getal . " gelukgsgetal: " . $geluksgetal .'<br>';
        if (!empty($geluksgetal)) {
            $processor->felicitatie($geluksgetal);
            $processor->save($naam, $voornaam);            
        }
    } else {
        echo "<br>Getal moet kleiner of gelijk aan zijn aan 10";
        echo '<br><a href="index.php"<button>Terug</button></a>';
    }
}
