<?php
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Overzicht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <br>
    <?php include 'navigate.php'; ?>
    <h1>Koe-log</h1>
    <?php  
    $sql = 'SELECT * FROM koe';
    $result = mysqli_query($con, $sql);
    while ($output = mysqli_fetch_assoc($result)) {
        echo '<br> ' . $output['naam'] . ' ' . $output['melk'] . 'L melk ' . $output['datum'] . ' ' . $output['opmerking'];
    }
    ?>
    <form action="zoek.php" method="post">
        <p>Overzicht van één koe:</p>
        <input type="text" name="naam">
        <input type="submit" value="zoeken">
    </form>
</body>
</html>