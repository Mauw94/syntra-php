<?php
include 'database.php';
$naam = strtolower($_POST['naam']);
$melk = $_POST['melk'];
$datum = $_POST['date'];
$opmerking = $_POST['opmerking'];

$sql = "INSERT INTO koe VALUES(NULL, '$naam', '$melk', '$datum', '$opmerking')";
if (mysqli_query($con, $sql)) {
    echo '<br> added!';
    ?>
    <meta http-equiv="refresh" content="1; URL='index.php'"/>
<?php 
} else {
    'fout bij toevoeging';
}

?>