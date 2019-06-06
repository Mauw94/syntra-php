      <div class="container" style="margin-top: 30px;">
         <h1 class="menu-title"><?php echo $title; ?></h1>
         <div class="login-underline"></div>
         <?php if (isset($msg)) { ?>
            <div class="alert alert-success alert-dismissible" style="margin-top: 10px; width: 55%;">
               <?php echo $msg; ?> 
            </div>
         <?php } ?>
         <div class="company-landing">    
                    
            <form method="post" action="<?php echo $action; ?>">
               <div class="form-group">
                  <input type="text" name="filter" placeholder="Filter projects" class="form-control" style="max-width: 50%;">                 
               </div>
               <input type="submit" name="search" value="Search" class="btn btn-primary" style="font-weight: bold;">
               <a href="<?php echo base_url();?>home/all" type="button" name="All" value="View all" class="btn btn-info" style="font-weight:bold;">View all</a>
            </form>
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
                        case strpos($key, 'javascript'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/javascript.png"> <?php
                           break;
                        case strpos($key, 'java'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/java.png"> <?php
                           break;
                        case strpos($key, 'react'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/react.png"> <?php
                           break;  
                        case strpos($key, 'php'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/php.png"> <?php
                           break;    
                        case strpos($key, 'typescript'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/typescrip.png"> <?php
                           break;   
                        case strpos($key, 'node'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/nodejs.png"> <?php
                           break;      
                        case strpos($key, 'nodejs'): ?>
                           <img class="card-img-top" src="<?= base_url(); ?>images/php.png"> <?php
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
                           if ($favorites) {
                              if (in_array($project->id, $favorites)) {
                                 ?><a href="<?php echo base_url();?>user/favorite_project/<?php echo $project->id;?>" class="btn btn-info" style="margin-right: 10px;"><i class="fas fa-heart"></i></a>
                                 <?php
                              } else {
                                 ?>
                                 <a href="<?php echo base_url();?>user/favorite_project/<?php echo $project->id;?>" class="btn btn-info" style="margin-right: 10px;"><i class="far fa-heart"></i></a>
                                 <?php
                              }
                           } else {
                              ?><a href="<?php echo base_url();?>user/favorite_project/<?php echo $project->id;?>" class="btn btn-info" style="margin-right: 10px;"><i class="far fa-heart"></i></a><?php
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