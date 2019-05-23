<div class="container">
<h1 style="color:white; text-align:center; font-weight:bold; font-size: 50px; margin-bottom: 100px;">New project</h1>

        <form action="<?php echo $action;?>" method="post">
            <div class="form-group">
                <input type="text"  class="menu-input reg-input" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" class="menu-input reg-input" name="prog_lang" placeholder="Main programming language">
            </div>
            <div class="form-group">
                <input type="text" class="menu-input reg-input" name="project_owner" placeholder="Project leader">
            </div>
            <div class="form-group">
                <textarea type="text" class="menu-input reg-input" name="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <textarea type="text" class="menu-input reg-input" name="location" placeholder="Location"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="menu-input reg-input" name="keys" placeholder="Key words">
            </div>    
            <div class="form-group">
                <label style="margin-left: 200px;">Project start date</label>    
                <input type="date" class="menu-input reg-input" name="start_date" placeholder="Start date">
            </div>  
            <div class="form-group">
                <label style="margin-left: 200px;">Project end date</label>
                <input type="date" class="menu-input reg-input" name="end_date" placeholder="End date">
            </div>  

            <input style="margin-left: 500px;" type="submit" value="Save" class="btn sm-btn-green">
        </form>
</div>