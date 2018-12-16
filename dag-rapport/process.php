<?php
include 'db/db.php';

$dag = $_POST['dag'];
$datum = $_POST['datum'];
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

$sql = "INSERT INTO rapport VALUES(NULL, '$dag', '$datum', '$aantalBezoekers', '$omzet', 'nothing', '$telefoonBoodschappen', 
    '$bijzonderheden', 0)";
    if (mysqli_query($con, $sql)) {
        echo "inserted";
    } else {
        echo mysqli_error($con);
    }
?>