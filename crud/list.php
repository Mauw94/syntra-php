<?PHP include 'database.php'?>
<!DOCTYPE html>
<html>
<head>
    <title>Weergave</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
<h1>Oplijsting van records</h1>

<form action="zoek.php" method="post">
   <p>Zoeken</p><input type="text" name="naam">
   <input type="submit" value="zoeken">
</form>
<?PHP include 'navigate.php'?>
<?PHP
$sql="SELECT * FROM personen";
$result=mysqli_query($con,$sql);
//print_r($result);
while ($output=mysqli_fetch_assoc($result)) {
    echo '<br>' . 'Naam: ' . $output['naam']. ' '. $output['voornaam']." ".$output['email']."<br>";
}
?>

</body>
</html>