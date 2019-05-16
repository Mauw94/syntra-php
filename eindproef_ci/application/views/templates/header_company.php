<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" href="<?= base_url(); ?>css/main.css"> 
      <script src="<?= base_url(); ?>js/time.js"></script>
      <title>FreelancePlatform 101</title>
   </head>
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
                        <a class="nav-link" href="<?php echo base_url();?>home">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>company/profile">Profile</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>company/projects">Projects</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>login/logout">Sign-out</a>
                     </li>
                  </ul>
                  <?php
                     if ($this->session->userdata('company')['setup_profile'] == 1) {
                        ?><span class="navbar-text">Welcome, <?php echo $this->session->userdata('company')['name'];
                        ?> - <?php
                     }
                  ?>
                  <span class="navbar-text" id="clock" style="font-weight: bold;">
                  </span>
               </div>
            </nav>
         </div>
      </div>