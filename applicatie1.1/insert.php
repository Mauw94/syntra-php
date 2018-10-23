<?php
include 'database.php';
$add = false;
$naam = strtolower($_POST['naam']);
$melk = $_POST['melk'];
$datum = $_POST['date'];
$opmerking = $_POST['opmerking'];

if (dateCheck($datum)) {
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