<?PHP

include 'database.php';
include 'navigate.php';
$id = $_POST['id'];
$sql = "DELETE FROM personen WHERE id='$id'";
if (mysqli_query($con,$sql)){
    echo "succesvol verwijderd";
} else {
    echo "fout bij verwijdering";
}
?>