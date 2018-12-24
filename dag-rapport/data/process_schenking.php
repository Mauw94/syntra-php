<?php
include '../db/db.php';

/*
    insert a new schenking if the description has been filled in
    if anonymous -> dont fill in the name, and set anonymous field to TRUE
*/

 if (isset($_POST['omschrijving'])) {
    $omschrijving = $_POST['omschrijving'];
    $datum = $_POST['datum'];
    if (isset($_POST['anoniem'])) {
        $anoniem = $_POST['anoniem'];
        $sql = "INSERT INTO schenkingen VALUES(NULL, 'anoniem', '$omschrijving', '$datum', TRUE)";
        if (mysqli_query($con, $sql)) {
            /* hier kan iets beters komen, kleine pop-up? */
            echo "Opgeslagen"; ?>
            <meta http-equiv="refresh" content="1; URL='../index.php'"/>
            <?php
        } else {
            echo mysqli_error($con);
        }
    } else {
        $naam = $_POST['naam'];
        $sql = "INSERT INTO schenkingen VALUES(NULL, '$naam', '$omschrijving', '$datum', FALSE)";
        if (mysqli_query($con, $sql)) {
            echo "Opgeslagen"; ?>
            <meta http-equiv="refresh" content="1; URL='../schenkingen.php'"/>
            <?php
        } else {
            echo mysqli_error($con);
        }
    }
 } else {
     echo "Omschrijving required";
 }
?>