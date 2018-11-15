<?php
include "conn.php";
include "head.php";
$id =  $_POST['id'];
$sql = "SELECT * FROM personen WHERE id='$id'";
$result = mysqli_query($con, $sql);
$person = mysqli_fetch_assoc($result);
?>
<div class="container">
    <form action="update.php" method="post">
        <h2>Person details</h2>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <div class="form-group">
            <p>Name:</p>
            <input type="text" name="name" class="form-control" value="<?php echo $person['name']?>">
        </div>
        <div class="form-group">
            <p>Address:</p>
            <input type="text" name="address" class="form-control" value="<?php echo $person['adress']?>">
        </div>
        <div class="form-group">
            <p>Phone:</p>
            <input type="text" name="phone" class="form-control" value="<?php echo $person['phone']?>">
        </div>
        <div class="form-group">
            <p>E-mail:</p>
            <input type="text" name="email" class="form-control" value="<?php echo $person['email']?>">
        </div>
        <div class="form-group">
            <p>Birthdate:</p>
            <input type="text" name="birth" class="form-control" value="<?php echo $person['birth']?>">
        </div>
        <div class="form-group">
            <p>Username:</p>
            <input type="text" name="username" class="form-control" value="<?php echo $person['username']?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
    <a href="list.php"><button class="btn btn-default">Back</button></a>
</div