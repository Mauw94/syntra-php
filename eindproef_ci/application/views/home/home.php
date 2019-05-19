      <div class="container" style="margin-top: 30px;">
         <h1 class="menu-title"><?php echo $title; ?></h1>
         <div class="login-underline"></div>
         <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
         </div>
         <div class="row" style="margin-top: 90px;">
         <?php 
         // print_r($projects);
         foreach ($projects as $project) { ?>             
            <div class="col-md-3" style="width: 18rem;">
               <div class="card">
                  <img class="card-img-top" src="images/placeholder.png" alt="Card image cap">
                     <div class="card-body">
                        <h5 class="card-title"><?php echo $project->title; ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                     </div>
               </div>
            </div>
         <?php } ?>         
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
   </body>
</html>