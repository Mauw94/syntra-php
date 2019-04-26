<div class="container menu-container">
    <h1 class="menu-title"><?php echo $title; ?></h1>
    <div class="login-underline"></div>
    <div class="login-message">
    <h5 style="color: white; margin:auto;">Finish setting up your profile!</h5>
    </div>

    <form action="<?php echo $action;?>" method="post">
        <div class="form-group">
            <input type="text" name="github" placeholder="github" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="text" name="price/h" placeholder="preferred salary/h" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="text" name="prog_languages" placeholder="programming languages" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="text" name="pref_language" placeholder="preferred language" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="text" name="min_days/week" placeholder="min days/week available" class="btn menu-input">
        </div>
        <hr style="color:white;">
        <div class="form-group">
            <input type="text" name="age" placeholder="age" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="text" name="nationality" placeholder="nationality" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="text" name="hobbies" placeholder="hobbies" class="btn menu-input">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="save" class="btn-left sm-btn-white">
        </div>
    </form>
</div>