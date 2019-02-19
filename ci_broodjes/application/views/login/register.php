<body>
<div class="container">
<h1 class="menu-title">Login</h1>
    <div class="menu-price">
        <!-- <p>&euro;</p> -->
    </div>
<form action="<?php echo $action;?>" method="post">
    <div class="form-group">
        <label style="color: white">Voornaam </label>
        <input type="text"  class="menu-input" name="firstname">
    </div>
    <div class="form-group">
        <label style="color: white">Achternaam </label>
        <input type="text"  class="menu-input" name="lastname">
    </div>
    <div class="form-group">
        <label style="color: white">Tel. nr</label>
        <input type="text"  class="menu-input" name="phonenumber">
    </div>
    <div class="form-group">
        <label style="color: white">E-mail</label>
        <input type="text"  class="menu-input" name="email">
    </div>
    <div class="form-group">
        <label style="color: white">Wachtwoord</label>
        <input type="password" class="menu-input" name="password">
    </div>
    <div class="form-group">
        <label style="color: white">Bevestig wachtwoord</label>
        <input type="password" class="menu-input" name="confirmpassword">
    </div>    

    <div class="form-group">
        <label style="color: white">Organisation</label>        
        <select  name="organisation" id="org">
            <option value="" selected disabled hidden>Kies hier</option>
            <?php 
            foreach ($organisations as $org)
            {
                ?><option value="<?php echo $org->orgName;?>"><?php echo $org->orgName;?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label style="color: white">Occupation</label>
        <select name="occupation">
        <option value="" selected disabled hidden>Kies hier</option>
        <?php 
            foreach ($Syntra as $occu)
            {
                ?><option value="<?php echo $occu->id;?>"><?php echo $occu->occName;?></option>
            <?php } ?>
        </select>
    </div>
    <input type="submit" value="Registreer" class="btn btn-primary">
<form>
<a href="<?= base_url(); ?>index.php/login" class="btn btn-primary">Terug</a>
</div>
<?php echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">'); ?>
</body>
</html>
