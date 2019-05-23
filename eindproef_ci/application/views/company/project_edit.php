<div class="container menu-container">
    <h1 class="menu-title"><?php echo $project[0]->name; ?></h1>
    <div class="login-underline"></div>
    <form>
    <div class="company-landing">
        <form action="<?php echo $action;?>" method="post" style="width: 50%;">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                    </div>
                <input type="text" class="form-control" name="name" value="<?php echo $project[0]->name;?>">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Programming language</span>
                    </div>
                <input type="text" class="form-control" name="prog_lang" value="<?php echo $project[0]->prog_lang;?>">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                <textarea type="text" class="form-control" name="description"><?php echo $project[0]->description;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Project owner</span>
                    </div>
                <input type="text" class="form-control" name="project_owner" value="<?php echo $project[0]->project_owner;?>">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Location</span>
                    </div>
                <input type="text" class="form-control" name="location" value="<?php echo $project[0]->location;?>">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Start date</span>
                    </div>
                <input type="date" class="form-control" name="start_date" value="<?php echo $project[0]->start_date;?>">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">End date</span>
                    </div>
                <input type="date" class="form-control" name="end_date" value="<?php echo $project[0]->end_date;?>">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" value="Update" name="submit">
            </div>
        </form>
    </div>
</div>