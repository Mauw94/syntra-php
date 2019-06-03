<div class="container menu-container">
    <h1 class="menu-title"><?php echo $title; ?></h1>
    <div class="login-underline"></div>
    <div class="login-message">
    <?php
    if($this->session->userdata('user')['logged_in'] == 1 || $this->session->userdata('company')['logged_in'] == 1) {
        ?>
        <a href="<?= base_url().'home';?>"><div class="alert alert-success" style="width: 50%; margin-top: 10px;">Already logged in. Click here to continue.</div></a>
        <?php
    }
    echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">');
?>
    <?php if (isset($msg)) {
    ?>
    <div class="alert alert-success alert-dismissible" style="margin-top: 10px; width: 55%;">
        <?php echo $msg; ?>
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
    <form action="<?php echo $action;?>" method="post">
        <div class="form-group">
           
            <input type="text" placeholder="E-mail" class="menu-input" name="email">
        </div>
        <div class="form-group">
            
            <input type="password" placeholder="Password" class="menu-input" name="password">
        </div>
        <input type="submit" value="Login" class="btn-left sm-btn-green">
    <form>

    <a href="<?php echo site_url('login/forgot_password_link');?>">
                <input type="button" class="btn-left sm-btn-green" value="Reset password">
    </a>

    <a href="<?= base_url(); ?>register">
                <input type="button" class="btn-right big-btn-white" value="Register">
    </a>

</div>