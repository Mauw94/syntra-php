<div class="container">
<h1 class="menu-title">Login</h1>
    <div class="menu-price">
        <!-- <p>&euro;</p> -->
    </div>
<?php
    if($this->session->userdata('user')['logged_in'] == 1) {
        ?>
        <a href="<?= base_url().'bestel';?>"><div class="alert alert-success" style="width: 50%; margin-top: 10px;">Ingelogd, klik hier om te bestellen</div></a>
        <?php
    }
?>
<form action="<?php echo $action;?>" method="post">
    <label style="color: white">E-mail</label>
    <div class="form-group">
        <input type="text" placeholder="E-mail" class="menu-input" name="email">
    </div>
    <label style="color: white">Wachtwoord</label>
    <div class="form-group">
        <input type="password" placeholder="Wachtwoord" class="menu-input" name="password">
    </div>
    
    <input type="submit" value="Login" class="btn btn-primary">
<form>
<?php echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">'); ?>
<br><hr>
<a href="<?php echo site_url('register');?>" class="btn btn-primary">Registreren</a>
<?php if (isset($success)) {
    ?>
    <div class="alert alert-success alert-dismissible" style="margin-top: 10px; width: 55%;">
        <?php echo $success; ?>
    </div>
    <?php
} ?>
<?php if (isset($failed)) {
    ?>
    <div class="alert alert-danger alert-dismissible" style="margin-top: 10px; width: 55%;">
        <?php echo $failed; ?>
    </div>
    <?php
} ?>
</div>