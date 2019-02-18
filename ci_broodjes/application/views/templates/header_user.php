<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Syntra Catering</title>
</head>
<body>
    <!-- <nav class="nav">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        <a class="nav-link active" href="#">Active</a>
        <a class="nav-link" href="#">Link</a>
        <a class="nav-link" href="<?php echo base_url(); ?>bestel/index">Bestellen</a>
        <a class="nav-link" href="<?php echo base_url(); ?>bestel/cart">Shopping Cart</a>
    </nav> -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-1">
                <img class="logo" src="https://t2-campus.be/wp-content/uploads/2018/01/T2-campus_logo_wit.svg">
            </div>
            <div class="menu" class="col-xs-2">
                <i class="fas fa-align-left fa-3x"></i>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="favorites" class="col-xs-2">
            <a href="<?php echo base_url(); ?>menus/favorites">
                <div class="cirkel-white">
                    <div class="favorite-heart">
                        <i class="fas fa-heart fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="count" class="col-xs-2">
            <div class="cirkel-red">
                <p>3</p> 
            </div>
        </div>
    </div>
            
<!-- </div> -->
            
    <div class="container-fluid">
        <div class="users" class="col-xs-2">
            <a href="<?php echo base_url(); ?>menus/personal">
                <div class="cirkel">
                    <div class="user-man">
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
       
    <div class="container-fluid">
        <div class="orders-plus" class="col-xs-2">
            <a href="<?php echo base_url(); ?>bestel/index">
                <div class="cirkel">
                    <div class="order-plus">
                        <i class="fas fa-plus fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="shopping-carts" class="col-xs-2">
            <a href="<?php echo base_url(); ?>bestel/cart">
                <div class="cirkel">
                    <div class="shopping-cart">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="container p-5">

    