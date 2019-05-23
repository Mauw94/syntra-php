<div class="container">
    <h1 class="menu-title">Favorites</h1>
    <div class="login-underline"></div>

    <div id="accordion" class="company-landing">
        <?php foreach($favorites as $key=>$fav) { ?>
          <div class="card" style="margin-top: 30px;">
            <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-info" data-toggle="collapse" data-target="#collapse<?php echo $key;?>" aria-expanded="true" aria-controls="collapseOne">
                <?php echo $fav[0]->name; ?>
                </button>
                <a href="<?php echo base_url();?>user/remove_favorite/<?php echo $fav[0]->id;?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </h5>
            </div>
    
            <div id="collapse<?php echo $key;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <?php echo $fav[0]->description;?>

                    <!-- show company info here too -->
                    <hr>
                    <h5>Company info</h5>
                    <ul>
                        <li>Name: <i><?php echo $companies[$key][0]->name;?></i></li>
                        <li>Phone nr: <i><?php echo $companies[$key][0]->phone;?></i></li>
                        <li>E-mail: <i><?php echo $companies[$key][0]->email;?></i></li>
                    </ul>
                </div>
            </div>
        </div>  
        <?php } ?>
    </div>
</div>