<div class="container">
    <h1 class="menu-title"><?php echo $name; ?></h1>
    <div class="login-underline"></div>
    <!-- <div style="margin-top: 50px; text-align:center">
        <a href="<?php echo base_url();?>company/profile" class="btn btn-info">Company profile</a>
        <a href="<?php echo base_url();?>company/project_add" class="btn btn-info">Add new project</a>
    <div> -->

    <div class="company-landing">
        <p>Overview of <?php echo $name;?> projects</p>

        <div class="row"  style="margin-top: 50px;">
            <!-- iterate over projects and display in cards !-->
            <?php             
            if ($projects == 'none found') {
                ?>
                <p>You have no projects added yet, click <a href="<?php echo base_url();?>company/project_add" class="btn btn-info">here</a> to add one!</p>
            <?php 
            } 
            else {
            foreach($projects as $project) { ?>
            <div class="col-md-3">
                <div class="card card-body">
                    <h5 class="card-title"><?php echo $project->name;?> </h5>
                    <p class="card-text"><?php echo $project->prog_lang;?> </p>
                    <hr>
                    <a class="btn btn-info" data-toggle="collapse" href="#collapse<?php echo $project->id;?>" role="button" aria-expanded="false" aria-controls="collapse<?php echo $project->id;?>">
                        View details</a>                                 
                </div>
                <div class="collapse" id="collapse<?php echo $project->id;?>">
                    <div class="card card-body">
                        <?php echo $project->description; ?>
                        <hr>
                        <div style="width: 50%; display:flex;">
                            <a href="<?php echo base_url();?>company/edit_project/<?php echo $project->id;?>" class="btn btn-sm btn-info" style="margin-right: 10px;"><i class="fa fa-folder"></i></a>
                            <a href="<?php echo base_url();?>company/delete_project/<?php echo $project->id;?>" class="btn btn-sm btn-danger" onclick="delete()"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } 
            } ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function delete() {
        var r = confirm('Are you sure you want to delete this project?');
        if (r==true) {
            return true;
        } else {
            return false;
        }
    }
</script>