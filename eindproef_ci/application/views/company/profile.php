<div class="container">
    <h1 class="menu-title"><?php echo $company[0]->name;?>, profile page</h1>
    <div class="login-underline"></div>

    <div class="company-landing">
        <form action="<?php echo $action;?>" method="post" style="width: 50%;">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Company name</span>
                    </div>
                    <input type="text" class="form-control" name="name" value="<?php echo $company[0]->name;?>">
                </div>
            </div>

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
        </form>
    </div>

</div>