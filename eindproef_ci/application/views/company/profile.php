<div class="container menu-container">
    <h1 class="menu-title"><?php echo $company[0]->name;?>, profile page</h1>
    <div class="login-underline"></div>
    
    <form action="<?php echo $action;?>" method="post">
    <input type="hidden" name="id" value="<?php echo $company[0]->id; ?>">
    <div class="company-landing">

        <form action="<?php echo $action;?>" method="post" style="width: 50%;">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Contact person</span>
                    </div>
                <input type="text" class="form-control" name="contact_person" value="<?php echo $company[0]->contact_person;?>">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Looking for</span>
                    </div>
                <input type="text" class="form-control" name="looking_for" value="<?php echo $company[0]->looking_for;?>">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                <input type="text" class="form-control" name="email" value="<?php echo $company[0]->email;?>">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Phone</span>
                    </div>
                <input type="text" class="form-control" name="phone" value="<?php echo $company[0]->phone;?>">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" value="Update" name="submit">
            </div>
            <a href="<?php echo base_url();?>company/company_landing" type="button" class="btn btn-info">Back</a>
        </form>
    </div>

</div>