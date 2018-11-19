<?php
include "conn.php";
include "navigate.php";

$json = file_get_contents("winnaars.json");
$json = json_decode($json, true);
?>
<h2>Winnaars vorig jaar: </h2>
<?php
for ($i = 0; $i < count($json['gewonnen']); $i++) {
    echo $json['gewonnen'][$i].'<br>';
}
?>
<h2>Winnaars dit jaar: </h2>
<?php
    $sql = "SELECT * FROM deelnemers WHERE gewonnen = 1";
    $result = mysqli_query($con, $sql);
    ?>
    <div>
        <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Voornaam</th>
                <th>Geluksgetal</th>                
            </tr>
        </thead>
        <tbody>
        <?php
        while ($output = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $output['naam'].'</td>';
            echo '<td>' . $output['voornaam'].'</td>';
            echo '<td>' . $output['geluksgetal'].'</td>';
        }
        ?>
        </tbody>
        </table>
    </div>