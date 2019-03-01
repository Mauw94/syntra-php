<?php
?>
<div class="container">
    <h1 class="menu-title">Informatie</h1>
    <div class="menu-price">
        <!-- <p>&euro;</p> -->
    </div>
    <div class="alert alert-danger"><strong>Als u uw e-mail update moet u opnieuw inloggen.</strong></div>
    <?php if (isset($success)) {
    ?>
    <div class="alert alert-success alert-dismissible" style="margin-top: 10px; width: 55%;">
        <?php echo $success; ?>
    </div>    
    <?php
} ?>
    <?php echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">'); ?>
    <form action="<?php echo $action;?>" method="post">
    <div class="form-group">
            <input type="hidden" value="<?php echo $user_details[0]['id'];?>" class="form-control" name="id">
        </div>
        <div class="form-group">
            <label>Voornaam: </label>
            <input type="text" value="<?php echo $user_details[0]['usrFirstName'];?>" class="menu-input" name="firstname">
        </div>
        <div class="form-group">
            <label>Achternaam: </label>
            <input type="text" value="<?php echo $user_details[0]['usrLastName'];?>" class="menu-input" name="lastname">
        </div>
        <div class="form-group">
            <label>E-mail: </label>
            <input type="hidden" value="<?php echo $user_details[0]['usrEmail'];?>" name="oldemail">
            <input type="text" value="<?php echo $user_details[0]['usrEmail'];?>" class="menu-input" name="email">
        </div>
        <div class="form-group">
            <label>Tel. nr: </label>
            <input type="text" value="<?php echo $user_details[0]['usrPhone'];?>" class="menu-input" name="phone">
        </div>       
        <?php if ($this->session->userdata('user')['admin'] == 1) {
            ?> <a href="<?php echo base_url().'/admin/send_bulk_mail';?>" class="btn btn-primary"><input type="button"  class="btn btn-primary">Send bulk mail</button></a>            
         <?php } ?>
        <a href="<?php echo base_url().'bestel';?>"><input type="button" value="Terug" class="menu-submit"></a>
        <input type="submit" value="Update gegevens" class="menu-submit">        
    </form>
    
</div>
<?php
?>