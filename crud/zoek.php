<?PHP include 'database.php'?>
<!DOCTYPE html>
<html>
<head>
    <title>Weergave</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
<h1>Zoeken</h1>
<?PHP include 'navigate.php'?>
<?PHP
$zoek= $_POST['naam'];
$sql="SELECT * FROM personen WHERE naam LIKE '%$zoek%'";
$result=mysqli_query($con,$sql);
//print_r($result);
while ($output=mysqli_fetch_assoc($result)) {
    echo $output['naam']." ".$output['voornaam']." ".$output['email']."<br>";
}
?>

</body>
</html>