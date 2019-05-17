<div class="container">
    <h1 style="color:white; text-align:center; font-weight:bold; font-size: 50px;"><?php echo $name;?></h1>
    <div style="margin-top: 50px; text-align:center">
        <a href="<?php echo base_url();?>company/profile" class="btn btn-info">Company profile</a>
        <a href="<?php echo base_url();?>company/project_add" class="btn btn-info">Add new project</a>
    <div>
    <h3 style="color:white;">Overview of company projects</h3>

    <div class="row"  style="margin-top: 50px;">
        <!-- iterate over projects and display in cards !-->
        <?php 
        foreach($projects as $project) { ?>
        <div class="col-md-3">
            <div class="card card-body">
                <h5 class="card-title"><?php echo $project->name;?> </h5>
                <p class="card-text"><?php echo $project->title;?> </p>
                <hr>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapse<?php echo $project->id;?>" role="button" aria-expanded="false" aria-controls="collapse<?php echo $project->id;?>">
                    View details</a>                                 
            </div>
            <div class="collapse" id="collapse<?php echo $project->id;?>">
                <div class="card card-body">
                    <?php echo $project->description; ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>