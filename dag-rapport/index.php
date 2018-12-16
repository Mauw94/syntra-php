<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grayscale - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#rapport">Rapport</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#projects">Overzicht</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase">Dag rapport <?php echo date('Y:m:d');?></h1>
          <h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>
          <a href="#rapport" class="btn btn-primary js-scroll-trigger">Ga naar rapport</a>
        </div>
      </div>
    </header>

    <!-- Rapport invullen -->
    <section id="rapport" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-white mb-4">DAG RAPPORT</h2>
              <form method="post" action="process.php">
                <div class="form-group">
                  <label class="text-white" for="Dag">Dag</label>
                  <input type="text" class="form-control" id="dag" placeholder="dag" name="dag">
                </div>
                <div class="form-group">
                  <label class="text-white" for="datum">Datum</label>
                  <input type="date" value ="<?php echo date('Y-m-d');?>" class="form-control" id="datum" placeholder="datum" name="datum">
                </div>
                <div class="form-group">
                  <label class="text-white" for="aantal">Aantal bezoekers</label>
                  <input type="text" class="form-control" id="aantal" placeholder="aantal bezoekers" name="aantal">
                </div>
                <div class="form-group">
                <label class="text-white" for="aantal">Omzet</label>
                  <input type="text" class="form-control" id="omzet" placeholder="omzet" name="omzet">
                </div>
                <div class="form-group">
                  <label class="text-white" for="telefoon">Telefoon boodschappen (naam + telnr vermelden)</label>
                  <textarea class="form-control" id="telefoon" rows="3" name="telefoon"></textarea>
                </div>
                <div class="form-group">
                  <label class="text-white" for="bijzonderheden">Bijzonderheden</label>
                  <textarea class="form-control" id="bijzonderheden" rows="3" name="bijzonderheden"></textarea>
                </div>
                <div class="form-group">
                  <label class="text-white" for="bijzonderheden">Verkochte artikelen museumshop</label>
                  <input type="text" class="form-control" id="verkochte1" placeholder="verkochte artikelen" name="verkochte1">
                  <input type="text" class="form-control" id="bedrag1" placeholder="bedrag" name="bedrag1">
                  <label class="text-white">Contant</label><input type="checkbox" class="form-control" id="contant1" name="contant1">
                  <label class="text-white">Gepind</label><input type="checkbox" class="form-control" id="gepind1" name="gepind1">
                </div>
                <div class="form-group">
                  <label class="text-white" for="bijzonderheden">Verkochte artikelen museumshop</label>
                  <input type="text" class="form-control" id="verkochte2" placeholder="verkochte artikelen" name="verkochte2>
                  <input type="text" class="form-control" id="bedrag2" placeholder="bedrag" name="bedrag2">
                  <label class="text-white">Contant</label><input type="checkbox" class="form-control" id="contant2" name="contant2">
                  <label class="text-white">Gepind</label><input type="checkbox" class="form-control" id="gepind2" name="gepind2">
                </div>
                <div class="form-group">
                  <label class="text-white" for="bijzonderheden">Verkochte artikelen museumshop</label>
                  <input type="text" class="form-control" id="verkochte3" placeholder="verkochte artikelen" name="verkochte3">
                  <input type="text" class="form-control" id="bedrag3" placeholder="bedrag" name="bedrag3">
                  <label class="text-white">Contant</label><input type="checkbox" class="form-control" id="contant3" name="contant3">
                  <label class="text-white">Gepind</label><input type="checkbox" class="form-control" id="gepind3" name="gepind3">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-default">
                </div>
              </form>
          </div>
        </div>
        <img src="img/demo-image-02.jpg" class="img-fluid" alt="">
      </div>
    </section>

 <!-- Contact Section -->
 <section class="contact-section bg-black"> 
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Addres</h4>
                <hr class="my-4">
                <div class="small text-black-50">6191AB Beek Maastrichterlaan 45</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Email</h4>
                <hr class="my-4">
                <div class="small text-black-50">
                  <a href="#">info@eyewitnesswo2.nl</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Tel nr</h4>
                <hr class="my-4">
                <div class="small text-black-50">+31(0)46 43 707 69</div>
              </div>
            </div>
          </div>
        </div>

        <div class="social d-flex justify-content-center">
          <a href="#" class="mx-2">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-github"></i>
          </a>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; Your Website 2018
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

  </body>

</html>
