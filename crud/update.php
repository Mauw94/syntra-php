<?PHP include 'database.php'?>
<!DOCTYPE html>
<html>
<head>
    <title>Weergave</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
<h1>Oplijsting van records</h1>
<?PHP include 'navigate.php'?>
<?PHP
$sql="SELECT * FROM personen";
$result=mysqli_query($con,$sql);
//print_r($result);

while ($output=mysqli_fetch_assoc($result)) {
    //echo $output['naam']." ".$output['voornaam']." ".$output['email']."<br>";
    ?><form action="updatesend.php" method="post">
    <input type="hidden" name="id" value="<?PHP echo $output['id']?>">
    <input type="text" name="naam" value="<?PHP echo $output['naam']?>">
    <input type="submit" value="update">
    </form>
    <!-- delete knopje -->
    <form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?PHP echo $output['id']?>">
    <input type="submit" value="verwijder">
    </form>
    <hr>
    <?PHP
}
?>
</body>
</html>