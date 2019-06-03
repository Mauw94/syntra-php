<div class="container">
    <h1 class="menu-title">Applicants</h1>
    <div class="login-underline"></div>
    <div id="accordion" class="company-landing">
    <h3>Project: <b><?php echo urldecode($projectname);?></b></h3>
    <p>Applications: <i><?php echo count($applicants);?></i></p>
        <?php foreach($applicants as $key=>$appl) { ?>
          <div class="card" style="margin-top: 30px;">
            <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-info" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <?php echo $appl[0]->first_name . ' ' . $appl[0]->last_name; ?>
                </button>                
            </h5>
            </div>
        </div> 
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Applicant info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Firstname: <b><?php echo $appl[0]->first_name;?></b></p>
                    <p>lastname: <b><?php echo $appl[0]->last_name;?></b></b></p>
                    <p>Age: <b><?php echo $appl[0]->age;?></b></p>
                    <p>Years of experience: <b><?php echo $appl[0]->years_experience;?></b></p>
                    <p>E-mail: <b><?php echo $appl[0]->email;?></b></p>
                    <p>Phone: <b><?php echo $appl[0]->phone;?></b></p>
                    <p>Prog. language knowledge: <b><?php echo $appl[0]->prog_languages;?></b></p>
                    <p>Salary/h: <b><?php echo $appl[0]->price_h;?></b></p>
                    <p>Min. days available: <b><?php echo $appl[0]->min_days_week;?></b></p>
                    <p>Github: <b><?php echo $appl[0]->github;?></b></p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn info" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>
        <?php } ?>
        <div style="margin: 15px;">
            <a href="<?php echo base_url();?>company/company_landing" class="btn btn-sm ">Back</a>
        </div>
    </div>
</div>
