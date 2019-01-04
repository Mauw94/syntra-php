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
    <a href="artikelen.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>VERKOCHTE ARTIKELEN</p>
    </a>
    <a href="schenkingen.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-gift w3-xxlarge"></i>
    <p>SCHENKINGEN INGEVEN</p>
    </a>
    <a href="schenking_overzicht.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-gift w3-xxlarge"></i>
    <p>OVERZICHT SCHENKINGEN</p>
    </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-white w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="index.php" class="w3-bar-item w3-button" style="width:25% !important">RAPPORT</a>
    <a href="overzicht.php" class="w3-bar-item w3-button" style="width:25% !important">OVERZICHT RAPPORTEN</a>
    <a href="=artikelen.php" class="w3-bar-item w3-button" style="width:25% !important">VERKOCHTE ARTIKELEN</a>
    <a href="schenkingen.php" class="w3-bar-item w3-button" style="width:25% !important">SCHENKINGEN INGEVEN</a>
    <a href="overzicht_schenkingen.php" class="w3-bar-item w3-button" style="width:25% !important">OVERZICHT SCHENKINGEN</a>
  </div>
</div>

<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-white" id="home">
    <img src="img/eyewitness.png" alt="Eyewitness" class="w3-image" width="280" height="140">
    <p>
    <?php 
        echo date('h:i a'); echo '<br>' . date('d-m-Y');
    ?></p>
  </header>
<div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-black">Schenking</h2>
    <hr style="width:200px" class="w3-opacity">
      <form method="post" action="data/process_schenking.php" id="schenkingForm">
          <div class="form-input">
              <label>Anonieme schenking?</label>
              <input type="checkbox" name="anoniem" id="anoniem">
          </div>
          <br>
        <div id="form-input">
          <div class="form-group">
            <label for="Naam">Naam schenker</label>
            <input type="text" class="form-control" id="naam" placeholder="naam" name="naam">
          </div>
          <div class="form-group">
            <label for="datum">Datum</label>
            <input type="date" value ="<?php echo date('Y-m-d');?>" class="form-control" id="datum" placeholder="datum" name="datum" required>
          </div>
            <div class="form-group">
                <label>Omschrijving</label>
                <textarea  id="omschrijving" name="omschrijving" class="form-control" required></textarea>
            </div>
        </div>

      <div class="form-group">                  
        <input type="submit" value="Opslaan" class="btn btn-primary" onclick="getAantalVerkochteArtikelen()">
      </div>
    </form>
  </div