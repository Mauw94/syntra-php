<?php
print_r($this->session->userdata());?>
<div class="container">
    <h1>Details</h1>
    <form action="<?php echo $action;?>" method="post">
    <div class="form-group">
            <input type="hidden" value="<?php echo $user_details[0]['id'];?>" class="form-control" name="id">
        </div>
        <div class="form-group">
            <label>Voornaam: </label>
            <input type="text" value="<?php echo $user_details[0]['usrFirstName'];?>" class="form-control" name="firstname">
        </div>
        <div class="form-group">
            <label>Achternaam: </label>
            <input type="text" value="<?php echo $user_details[0]['usrLastName'];?>" class="form-control" name="lastname">
        </div>
        <div class="form-group">
            <label>E-mail: </label>
            <input type="text" value="<?php echo $user_details[0]['usrEmail'];?>" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Tel. nr: </label>
            <input type="text" value="<?php echo $user_details[0]['usrPhone'];?>" class="form-control" name="phone">
        </div>
        <input type="submit" value="Update gegevens" class="btn btn-dark">
        <a href="<?php echo base_url().'bestel';?>"><input type="button" value="Terug" class="btn btn-dark"></a>
    </form>
    <?php echo validation_errors('<p class="alert alert-danger alert-dismissable" style="margin-top: 10px;">'); ?>
    <?php if (isset($success)) {
    ?>
    <div class="alert alert-success alert-dismissible" style="margin-top: 10px; width: 55%;">
        <?php echo $success; ?>
    </div>
    <?php
} ?>
</div>
<?php
?>