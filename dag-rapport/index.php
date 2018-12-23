<?php
include 'header.php';
?>
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="img/eyewitness.png" style="width:100%">
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-black">
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
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="index.php" class="w3-bar-item w3-button" style="width:25% !important">RAPPORT</a>
    <a href="overzicht.php" class="w3-bar-item w3-button" style="width:25% !important">OVERZICHT RAPPORTEN</a>
    <a href="verkochte_artikelen.php" class="w3-bar-item w3-button" style="width:25% !important">VERKOCHTE ARTIKELEN</a>
  </div>
</div>
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Eyewitness</span> dagrapport</h1>
    <p><?php echo date('d:m:Y');?></p>
    <img src="img/eyewitness.png" alt="Eyewitness" class="w3-image" width="280" height="140">
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Rapport</h2>
    <hr style="width:200px" class="w3-opacity">
      <form method="post" action="data/process.php" id="rapportForm">
        <div id="form-input">
          <div class="form-group">
            <label for="Dag">Dag</label>
            <input type="text" class="form-control" id="dag" placeholder="dag" name="dag" required>
          </div>
          <div class="form-group">
            <label for="datum">Datum</label>
            <input type="date" value ="<?php echo date('Y-m-d');?>" class="form-control" id="datum" placeholder="datum" name="datum" required>
          </div>
          <div class="form-group">
            <label for="aantal">Aantal bezoekers</label>
            <input type="text" class="form-control" id="aantal" placeholder="aantal bezoekers" name="aantal" required>
          </div>
          <div class="form-group">
          <label  for="aantal">Omzet</label>
            <input type="text" class="form-control" id="omzet" placeholder="omzet" name="omzet" required>
          </div>
          <div class="form-group">
            <label for="telefoon">Telefoon boodschappen (naam + telnr vermelden)</label>
            <textarea class="form-control" id="telefoon" rows="3" name="telefoon"></textarea>
          </div>
          <div class="form-group">
            <label  for="bijzonderheden">Bijzonderheden</label>
            <textarea class="form-control" id="bijzonderheden" rows="3" name="bijzonderheden"></textarea>
          </div>
          <div class="form-group artikelen">
            <label  for="bijzonderheden">Verkochte museumshop artikelen</label>
            <input type="text" class="form-control" id="verkochte1" placeholder="artikel naam" name="verkochte1">
            <input type="text" class="form-control" id="bedrag1" placeholder="bedrag" name="bedrag1">
            <span>Gepind?</span><input type="checkbox" class="form-control" id="gepind1" name="gepind1">
          </div>
        </div>
      <input type="hidden" name="aantalArtikelen" id="aantalArt">

      <div class="form-group">                  
        <button type="button" class="btn btn-default" onclick="addArtikelFields()">Voeg extra artikel veld toe</button>
        <input type="submit" class="btn btn-primary" onclick="getAantalVerkochteArtikelen()">
      </div>
    </form>
  </div