<div class="container">
    <h1 class="menu-title">Details</h1>    
    <div class="login-underline"></div>

    <div class="company-landing">
        
        <h3>Project info</h3>
        <ul>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">Name: <?php echo $project[0]->name;?></span>
                    </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">Description: <?php echo $project[0]->description;?></span>
                    </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">Programming language(s): <?php echo $project[0]->prog_lang;?></span>
                    </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">Location: <?php echo $project[0]->location;?></span>
                    </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">Start date <?php echo $project[0]->start_date;?></span>
                    </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">End date: <?php echo $project[0]->end_date;?></span>
                    </div>
                    </div>
                </div>
            </li>
        </ul>
        <hr>
        <h3>Company info</h3>
        <ul>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">Name: <?php echo $company[0]->name;?></span>
                    </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">Contact person: <?php echo $company[0]->contact_person;?></span>
                    </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">Phone nr: <?php echo $company[0]->phone;?></span>
                    </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group">            
                    <div class="input-group">                
                    <div>
                        <span class="input-group-text">E-mail: <?php echo $company[0]->email;?></span>
                    </div>
                    </div>
                </div>
            </li>
        </ul>
        <hr>
        
        <a href="#" class="btn btn-info">Favorite</a>
        <a href="#" class="btn btn-info">Apply!</a>

        <a href="<?php echo base_url();?>home" class="btn btn-sm-white">Back</a>
    </div>

</div>