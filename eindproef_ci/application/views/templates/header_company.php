<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="<?= base_url(); ?>css/main.css"> 
      <script src="<?= base_url(); ?>js/time.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <title>Freelancer.dev</title>
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
                        <a class="nav-link" href="<?php echo base_url();?>company_landing">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>company/profile">Profile</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>company/projects">Projects</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>company/project_add">Add Project</a>
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