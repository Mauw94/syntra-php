<div class="container menu-container">
    <h1 class="menu-title"><?php echo $title; ?></h1>
    <div class="login-underline"></div>


    <?php echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">'); ?>

    <form action="<?php echo $action;?>" method="post">
    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
    <div class="company-landing">
        <div class="login-message">
            <h5 style="color: white; margin:auto;">Finish setting up your profile!</h5>
        </div>
        <form action="<?php echo $action;?>" method="post" style="width: 50%;">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Github account</span>
                    </div>
                <input type="text" class="form-control" name="github">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Preferred salary/h</span>
                    </div>
                <input type="text" class="form-control" name="price_h">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Known programming language(s)</span>
                    </div>
                <input type="text" class="form-control" name="prog_languages">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Preferred language/framework</span>
                    </div>
                <input type="text" class="form-control" name="pref_language">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Min days/week available</span>
                    </div>
                <input type="text" class="form-control" name="min_days_week">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Years of experience</span>
                    </div>
                <input type="number" class="form-control" name="experience">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Age</span>
                    </div>
                <input type="number" class="form-control" name="age">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nationality</span>
                    </div>
                <input type="text" class="form-control" name="nationality">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Hobbies/interest</span>
                    </div>
                <input type="text" class="form-control" name="hobbies">
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Are you available right now?</span>
                    </div>
                <input type="checkbox" class="form-control" name="available">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" value="Save" name="submit">
            </div>

        </form>
    </div>
</div>