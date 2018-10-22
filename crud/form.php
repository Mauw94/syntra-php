<?PHP 
include 'database.php';
$naam=$_POST['naam'];
$voornaam=$_POST['voornaam'];
$email=$_POST['email'];

$sql ="INSERT INTO personen VALUES (NULL,'$naam','$voornaam','$email')";
if (mysqli_query ($con,$sql)){
    echo "toegevoegd";
} else {
    echo "fout bij toevoegen record";
};

?>
