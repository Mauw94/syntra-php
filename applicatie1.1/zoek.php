<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Overzicht van één koe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
    <br>
    <?php include 'navigate.php'; ?>
    <?php
    $zoek = strtolower($_POST['naam']);
    $sql = "SELECT * FROM koe WHERE naam LIKE '%$zoek%'";
    $result = mysqli_query($con, $sql);
    $melk = 0;
    $naam = '';
    while ($output = mysqli_fetch_assoc($result)) {
        $melk += $output['melk'];        
        $naam = $output['naam'];
    } 
    echo $naam . '<br> Aantal liters melk ' . $melk . 'L';
    ?>    
</body>
</html>