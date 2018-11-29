<?php 
include 'head.php';
include 'db/conn.php';
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.php">Home</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
    <div class="row">
        <div class="col-lg-10 mx-auto">
        <h1 class="text-uppercase">
            <strong><?php echo $connected ?></strong>
        </h1>
        <hr>
        </div>
        <div class="col-lg-8 mx-auto">
        <p class="text-faded mb-5">
            text text text
        </p>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">text</a>
        </div>
    </div>
    </div>
</header>