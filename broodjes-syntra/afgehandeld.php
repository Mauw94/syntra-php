<?php
include 'database.php';
$id = $_POST['id'];
$afgehaald = false;
if (isset($_POST['afgehaald'])) {
    $afgehaald = true;
} else {
    $afgehaald = false;
}

# update broodje table
$sql = "UPDATE broodje SET afgehaald = '$afgehaald' WHERE id = '$id'";
if (mysqli_query($con, $sql)) {
    echo '<label class="warning">updated</label>'; ?> 
     <meta http-equiv="refresh" content="0.5; URL='list.php'"/>
    <?php
} else {
    echo 'Something went wrong.'; ?>
    <meta http-equiv="refresh" content="1; URL='list.php'"/>
    <?php
}
?>