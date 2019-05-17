<div class="container">
    <h1 class="menu-title"><?php echo $name; ?></h1>
    <div class="login-underline"></div>
    <!-- <div style="margin-top: 50px; text-align:center">
        <a href="<?php echo base_url();?>company/profile" class="btn btn-info">Company profile</a>
        <a href="<?php echo base_url();?>company/project_add" class="btn btn-info">Add new project</a>
    <div> -->

    <div class="company-landing">
        <p>Overview of company projects</p>

        <div class="row"  style="margin-top: 50px;">
            <!-- iterate over projects and display in cards !-->
            <?php 
            foreach($projects as $project) { ?>
            <div class="col-md-3">
                <div class="card card-body">
                    <h5 class="card-title"><?php echo $project->name;?> </h5>
                    <p class="card-text"><?php echo $project->title;?> </p>
                    <hr>
                    <a class="btn btn-info" data-toggle="collapse" href="#collapse<?php echo $project->id;?>" role="button" aria-expanded="false" aria-controls="collapse<?php echo $project->id;?>">
                        View details</a>                                 
                </div>
                <div class="collapse" id="collapse<?php echo $project->id;?>">
                    <div class="card card-body">
                        <?php echo $project->description; ?>
                        <div style="width: 50%; display:flex;">
                            <a href="#" class="btn btn-sm btn-info" style="margin-right: 10px;"><i class="fa fa-folder"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>