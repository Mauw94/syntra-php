<?PHP 
include 'database.php';
include 'navigate.php';
$naam = $_POST['naam'];
$id = $_POST['id'];
$sql = "UPDATE personen SET naam='$naam' WHERE id='$id'";
if (mysqli_query ($con,$sql)) {
    echo "record update ok";
} else {
    echo "update failed";
}
?>