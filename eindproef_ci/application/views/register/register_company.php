<div class="container menu-container">
    <h1 class="menu-title"><?php echo $title; ?></h1>
    <div class="register-underline"></div>
    <div class="login-message">
    <?php echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 40px;">'); ?>
      </div>
    <form action="<?php echo $action;?>" method="post">
        <div class="form-group">
            <input type="text"  class="menu-input reg-input" name="name" placeholder="Company Name">
        </div>
        <div class="form-group">
            <input type="text"  class="menu-input reg-input" name="contact_person" placeholder="Contact Person Name">
        </div>
        <div class="form-group">
            <input type="text"  class="menu-input reg-input" name="phone" placeholder="Phone Number">
        </div>
        <div class="form-group">
            <input type="text"  class="menu-input reg-input" name="email" placeholder="E-mail">
        </div>
        <div class="form-group">
            <input type="password" class="menu-input reg-input" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" class="menu-input reg-input" name="confirmpassword" placeholder="Confirm Password">
        </div>    

        <input type="submit" value="Register" class="btn-left sm-btn-green">
    <form>
        
    <a href="<?= base_url(); ?>register">
        <input type="button" class="btn-right big-btn-white" value="Back">
    </a>
</div>
    </body>
</html>