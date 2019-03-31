   <body onload="showTime()">
      <div class="row sticky-top">
         <div class="col-md-12">
            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand" href="#">FreelancePlatform</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Vacatures</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>register/index">Sign-up</a>
                     </li>
                  </ul>
                  <span class="navbar-text" id="clock" style="font-weight: bold;">
                  </span>
               </div>
            </nav>
         </div>
      </div>
      <div class="container" style="margin-top: 30px;">
         <div class="row">
            <div class="col-md-6">
               <h1><?php echo $title; ?></h1>
            </div>
            <div class="col-md-6"></div>
         </div>
         <div class="row" style="margin-top: 90px;">
            <div class="col-md-3" style="width: 18rem;">
               <div class="card">
                  <img class="card-img-top" src="images/placeholder.png" alt="Card image cap">
                  <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
               </div>
            </div>
            <div class="col-md-3" style="width: 18rem;">
               <div class="card">
                  <img class="card-img-top" src="images/placeholder.png" alt="Card image cap">
                  <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
               </div>
            </div>
            <div class="col-md-3" style="width: 18rem;">
               <div class="card">
                  <img class="card-img-top" src="images/placeholder.png" alt="Card image cap">
                  <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
               </div>
            </div>
            <div class="col-md-3" style="width: 18rem;">
               <div class="card">
                  <img class="card-img-top" src="images/placeholder.png" alt="Card image cap">
                  <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row"  style="margin-top: 50px;">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
         
      </div>
      <!-- Optional JavaScript -->
      <script src="js/time.js"></script>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   </body>
</html>