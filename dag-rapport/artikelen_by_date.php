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
  <a href="overzicht.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>OVERZICHT RAPPORTEN</p>
  </a>
  <a href="artikelen.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>VERKOCHTE ARTIKELEN</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="index.php" class="w3-bar-item w3-button" style="width:25% !important">RAPPORT</a>
    <a href="overzicht.php" class="w3-bar-item w3-button" style="width:25% !important">OVERZICHT RAPPORTEN</a>
    <a href="=artikelen.php" class="w3-bar-item w3-button" style="width:25% !important">VERKOCHTE ARTIKELEN</a>
    <a href="schenkingen.php" class="w3-bar-item w3-button" style="width:25% !important">SCHENKINGEN INGEVEN</a>
  </div>
</div>
    <div class="w3-content w3-justify w3-text-black w3-padding-64 overzicht-table">
        <hr>
        <?php
                $date = $_GET['date'];
                $sql = "SELECT * FROM verkochte_artikelen WHERE datum = '$date'";
                $result = mysqli_query($con, $sql);
                ?>
                <div>
                    <h2>Verkochte artikelen <?php echo $date; ?></h2>
                    <table id="overzicht" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Naam</th>
                            <th scope="col">Bedrag</th>
                            <th scope="col">Contant/pin</th>                
                            <th scope="col">Datum</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($output = mysqli_fetch_assoc($result)) {
                        if ($output['contant/pin'] == '') {
                            $contantpin = 'Contant';
                        } else {
                            $contantpin = 'Gepind';
                        }
                        echo '<tr>';
                        echo '<td>' . $output['naam'].'</td>';
                        echo '<td>' . $output['bedrag'].'</td>';
                        echo '<td>' . $contantpin.'</td>';
                        echo '<td>' . $output['datum'].'</td>';
                    }
                    ?>
                    </tbody>
                    </table>                    
                    <a href="overzicht.php"><button class="btn btn-primary">Terug</button></a>
                </div>                
            </div>            
    </section>