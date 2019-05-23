      <div class="container" style="margin-top: 30px;">
         <h1 class="menu-title"><?php echo $title; ?></h1>
         <div class="login-underline"></div>
         <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
         </div>
         <div class="company-landing">            
            <div class="row" style="margin-top: 90px;">
            <?php 
            foreach ($projects as $project) { ?>             
               <div class="col-md-3" style="width: 18rem; margin-top:15px;">
                  <div class="card">
                     <?php 
                     $key = strtolower($project->prog_lang);
                     switch ($key) {
                        case strpos($key, 'angular'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/angular.png"> <?php
                           break;
                        case strpos($key, '.net'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/net.jpg"> <?php
                           break;
                        case strpos($key, 'java'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/java.png"> <?php
                           break;
                        case strpos($key, 'react'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/react.png"> <?php
                           break;
                        default: ?>
                           <img class="card-img-top" src="images/placeholder.png" alt="Card image cap"> <?php
                     }
                     ?>                     
                        <div class="card-body">
                           <h5 class="card-title"><?php echo $project->name; ?></h5>
                           <p class="card-text"><?php echo $project->prog_lang;?></p>
                           <a href="<?php echo base_url();?>project/details/<?php echo $project->id;?>/<?php echo $project->company_id;?>" class="btn btn-info">View details</a>

                           <?php
                           if (in_array($project->id, $favorites)) {
                              ?><a href="<?php echo base_url();?>user/favorite_project/<?php echo $project->id;?>" class="btn btn-info" style="margin-right: 10px;"><i class="fas fa-heart"></i></a>
                              <?php
                           } else {
                              ?>
                              <a href="<?php echo base_url();?>user/favorite_project/<?php echo $project->id;?>" class="btn btn-info" style="margin-right: 10px;"><i class="far fa-heart"></i></a>
                              <?php
                           }
                           ?>                                                     
                        </div>
                  </div>
               </div>
            <?php } ?>         
            </div>
         </div>

         <!-- <div class="row"  style="margin-top: 50px;">
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
        </div> -->
         
      </div>
      <!-- Optional JavaScript -->
      <script src="js/time.js"></script>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   </body>
</html>