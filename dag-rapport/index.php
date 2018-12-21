<?php
include 'header.php';
?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#rapport">Rapport</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="overzicht.php">Overzicht</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="artikelen.php">Verkochte artikelen</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="context">
    <!-- Header -->
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase">Dag rapport <?php echo date('d-m-Y');?></h1>
          <h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>
        </div>
      </div>
    </header>

    <!-- Rapport invullen -->
    <section id="rapport" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
              <form method="post" action="process.php" id="rapportForm">
                <div class="form-group">
                  <label for="Dag">Dag</label>
                  <input type="text" class="form-control" id="dag" placeholder="dag" name="dag">
                </div>
                <div class="form-group">
                  <label for="datum">Datum</label>
                  <input type="date" value ="<?php echo date('Y-m-d');?>" class="form-control" id="datum" placeholder="datum" name="datum">
                </div>
                <div class="form-group">
                  <label for="aantal">Aantal bezoekers</label>
                  <input type="text" class="form-control" id="aantal" placeholder="aantal bezoekers" name="aantal">
                </div>
                <div class="form-group">
                <label  for="aantal">Omzet</label>
                  <input type="text" class="form-control" id="omzet" placeholder="omzet" name="omzet">
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
                
                <input type="hidden" name="aantalArtikelen" id="aantalArt">

                <div class="form-group">                  
                <button type="button" class="btn btn-default" onclick="addArtikelFields()">Voeg extra artikel veld toe</button>
                  <input type="submit" class="btn btn-default" onclick="getAantalVerkochteArtikelen()">
                </div>
              </form>
          </div>
        </div>
        <img src="img/demo-image-02.jpg" class="img-fluid" alt="">
      </div>
    </section>
    </div>
