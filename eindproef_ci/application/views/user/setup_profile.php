<div class="container menu-container">
    <h1 class="menu-title"><?php echo $title; ?></h1>
    <div class="login-underline"></div>
    <div class="login-message">
        <h5 style="color: white; margin:auto;">Finish setting up your profile!</h5>
    </div>

    <?php echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">'); ?>

    <form action="<?php echo $action;?>" method="post">
    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
        <div class="form-group">
            <input type="text" placeholder="github" class="btn menu-input" name="github" >
        </div>
        <div class="form-group">
            <input type="text" placeholder="preferred salary/h" class="btn menu-input" name="price_h" >
        </div>
        <div class="form-group">
            <input type="text" name="prog_languages" placeholder="programming languages" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="text" name="pref_language" placeholder="preferred language" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="number" name="min_days_week" placeholder="min days/week available" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="number" name="experience" placeholder="years of experience" class="btn menu-input">
        </div>   
        
        <hr style="color:white;">

        <div class="form-group">
            <input type="number" name="age" placeholder="age" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="text" name="nationality" placeholder="nationality" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="text" name="hobbies" placeholder="hobbies" class="btn menu-input">
        </div>
        <div class="form-group">
            <label style="color:white; font-size: 30px;">Are you available right now?</label>
            <input type="checkbox" name="available" placeholder="available right now?" class="menu-input">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Save" class="btn-left sm-btn-green">
        </div>
    </form>
</div>