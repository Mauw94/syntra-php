<?php
include '../db/db.php';
include 'insert_artikel.php';

/*
    insert verkochte artikelen eerst als die er zijn
    daarna het dag rapport met de bijhorende keys
*/
$aantalArtikelen = $_POST['aantalArtikelen'];
$datum = $_POST['datum'];
if (isset($_POST['verkochte1'])) {
    $insertArt = new InsertArtikel($con);
    for ($i = 1; $i <= $aantalArtikelen; $i++) {
        if (isset($_POST['verkochte'.$i]) || !($_POST['verkochte'.$i] == '')) {
            $insertArt->insert($i, $datum);
        }
    }
}

$dag = $_POST['dag'];
$aantalBezoekers = $_POST['aantal'];
$omzet = $_POST['omzet'];
$telefoonBoodschappen = "";
$bijzonderheden = "";

if (isset($_POST['telefoon'])) {
    $telefoonBoodschappen = $_POST['telefoon'];
}
if (isset($_POST['bijzonderheden'])) {
    $bijzonderheden = $_POST['bijzonderheden'];
}

$sql = "INSERT INTO rapport VALUES(NULL, '$dag', '$datum', '$aantalBezoekers', '$omzet', '$telefoonBoodschappen', 
    '$bijzonderheden', NULL)";
    if (mysqli_query($con, $sql)) {
        echo "Opgeslagen!"; ?>
        <meta http-equiv="refresh" content="1; URL='../index.php'"/>
        <?php
    } else {
        echo mysqli_error($con);
    }
?>