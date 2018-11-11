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
    <h1>Koe-log</h1>
    <?php include 'navigate.php'; ?>
    <?php  
    $sql = 'SELECT * FROM koe ORDER BY datum ASC';
    $result = mysqli_query($con, $sql);
    echo '<table>';
    echo '<tr><th>Naam</th><th>L melk</th><th>Opmerking</th><th>Datum</th></tr>';
    while ($output = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $output['naam'] . '</td>';
        echo '<td>' . $output['melk'] . '</td>';
        echo '<td>' . $output['opmerking'] . '</td>';
        echo '<td>' . $output['datum'] . '</td>';
        echo '</tr>';
        # echo '<br> ' . $output['naam'] . ' ' . $output['melk'] . 'L melk ' . $output['datum'] . ' ' . $output['opmerking'];
    }
    echo '</table>';
    ?>
    <form action="zoek.php" method="post">
        <p>Overzicht van één koe:</p>
        <select name="naam">
            <option value="bella">Bella</option>
            <option value="germaine">Germaine</option>
            <option value="marie-fleure">Marie-Fleure</option>
        </select>
        <input type="submit" value="zoeken">
    </form>
</body>
</html>