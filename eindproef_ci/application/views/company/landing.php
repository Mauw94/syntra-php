<div class="container">
    <h1>Landing page for companies</h1>
    <button>go to profile</button>
    <button>go to all projects</button>

    <h3>Overview of recent projects</h3>

    <div class="row"  style="margin-top: 50px;">
        <!-- iterate over projects and display in cards !-->
        <?php foreach($projects as $project) { ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $project->name;?> </h5>
                    <p class="card-text"><?php echo $project->description;?> </p>
                    <hr>
                    <a href="#" class="btn btn-primary">View project</a>
                    <!-- make this a collapsing card to view the full details -->
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>