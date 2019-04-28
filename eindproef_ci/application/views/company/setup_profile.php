<div class="container menu-container">
    <h1 class="menu-title"><?php echo $title; ?></h1>
    <div class="login-underline"></div>
    <div class="login-message">
        <h5 style="color: white; margin:auto;">Finish setting up your company profile!</h5>
    </div>

    <?php echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">'); ?>

    <form action="<?php echo $action;?>" method="post">
    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
        <div class="form-group">
            <input type="text" placeholder="looking for" class="btn menu-input" name="looking for" >
        </div>
        
        <div class="form-group">
            <input type="submit" name="submit" value="Save" class="btn-left sm-btn-green">
        </div>
    </form>
</div>