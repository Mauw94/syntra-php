<div class="container">

<form action="<?php echo $action;?>" method="post">
    <label>E-mail</label>
    <div class="form-group">
        <input type="text" placeholder="E-mail" class="form-control" name="email">
    </div>
    <label>Password</label>
    <div class="form-group">
        <input type="password" placeholder="Password" class="form-control" name="password">
    </div>
    
    <input type="submit" value="Login" class="btn btn-primary">
<form>
<?php echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">'); ?>
<br><hr>
<a href="<?php echo site_url('register');?>" class="btn btn-success">Registreren</a>
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