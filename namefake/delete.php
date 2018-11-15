<?php
include "conn.php";

$id = $_POST['id'];
if (!empty($id)) {
    $sql = "DELETE FROM personen WHERE id='$id'";
    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully.";
        ?>
        <meta http-equiv="refresh" content="1; URL='list.php'"/>
        <?php
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
mysqli_close($con);
?>