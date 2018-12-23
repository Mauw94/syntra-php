<?php
include 'header.php';
include 'db/db.php';
?>
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="img/eyewitness.png" style="width:100%">
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>INVULLEN DAGRAPPORT</p>
  </a>
  <a href="overzicht.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>OVERZICHT RAPPORTEN</p>
  </a>
  <a href="artikelen.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>VERKOCHTE ARTIKELEN</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="index.php" class="w3-bar-item w3-button" style="width:25% !important">RAPPORT</a>
    <a href="overzicht.php" class="w3-bar-item w3-button" style="width:25% !important">OVERZICHT RAPPORTEN</a>
    <a href="verkochte_artikelen.php" class="w3-bar-item w3-button" style="width:25% !important">VERKOCHTE ARTIKELEN</a>
  </div>
</div>
    <div class="w3-content w3-justify w3-text-white w3-padding-64 overzicht-table">
        <hr>
            <?php
                $sql = "SELECT * FROM rapport";
                $result = mysqli_query($con, $sql);                
                ?>
                <div>
                <h2 class="mb-4">Rapporten</h2>
                    <table id="overzicht" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Dag</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Bezoekers</th>                
                            <th scope="col">Omzet</th>
                            <th scope="col">Telefoonboodschappen</th>
                            <th scope="col">Bijzonderheden</th>
                            <th>Verkochten artikelen</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($output = mysqli_fetch_assoc($result)) {
                        $datum = $output['datum'];
                        $sqlVerkopen = "SELECT * from verkochte_artikelen WHERE datum = '$datum'";
                        $resultVerkopen = mysqli_query($con, $sqlVerkopen);
                        echo '<tr>';
                        echo '<td>' . $output['dag'].'</td>';
                        echo '<td>' . $output['datum'].'</td>';
                        echo '<td>' . $output['bezoekers'].'</td>';
                        echo '<td>' . $output['omzet'].'</td>';
                        echo '<td>' . $output['telefoonboodschap'].'</td>';
                        echo '<td>' . $output['bijzonderheden'].'</td>';
                        if (mysqli_num_rows($resultVerkopen) != 0) {
                            echo '<td><a href="artikelen_by_date.php?date='.$datum.'"><button class="btn btn-primary">Bekijk</button></a></td>';
                        } else {
                            echo '<td>Geen verkopen</td>';
                        }
                    }
                    ?>
                    </tbody>
                    </table>
                </div>                
        </div>