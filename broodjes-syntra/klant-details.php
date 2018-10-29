<body>
<div class="container">
<?php
include 'head.php';
include 'navigate.php';
include 'database.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT bestelnr FROM broodje WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $output = mysqli_fetch_assoc($result);
    $bestelNr = $output['bestelnr'];
    
    $sqlKlant = "SELECT * FROM klant WHERE bestelnr = '$bestelNr'";
    $resultKlant = mysqli_query($con, $sqlKlant);
    echo '<h2>Klant-details</h2>';
    echo '<table class="table">';
    echo '<tr><th>Naam</th><th>Tel</th><th>E-mail</th></tr>';
    while ($outputKlant = mysqli_fetch_assoc($resultKlant)) {
        echo '<tr>';
        echo '<td>' . $outputKlant['naam'] . '</td>';
        echo '<td>' . $outputKlant['tel'] . '</td>';
        echo '<td>' . $outputKlant['email'] . '</td>';
        ?> 
        <form action="list.php" method="get">
        <td><input type="submit" value="back" class="btn btn-primary"></td>
        </form>
        <?php
        echo '</tr>';
    }
    echo '</table>';
    
}
?>
</div>
</body>