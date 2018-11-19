<?php
include "conn.php";

if (!isset($_POST['id'])) {
    $id = $_POST['id'];
    $name =  $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $birth = $_POST['birth'];
    $username = $_POST['username'];
    $sql = "UPDATE personen SET name='$name', adress='$address', phone='$phone', email='$email', birth='$birth', username='$username'
            WHERE id='$id'";
    if (mysqli_query($con, $sql)) {
        echo "Updated successfully!";
        ?>
        <meta http-equiv="refresh" content="1; URL='list.php'"/>
        <?php
    } else {
        echo "Error updating row " . mysqli_error($con);
    }
}
mysqli_close($con);
?>
