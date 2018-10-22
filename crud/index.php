<!DOCTYPE html>
<html>
<head>
    <title>Welkom</title>
<head>
<body>
<h1>Klasdatabank</h1>
<p>Welkom op onze eerste crud applicatie</p>
<?PHP include 'navigate.php'?>
<form action="form.php" method="post">
    <p>Naam<p>
    <input type="text" name="naam">
    <p>Voornaam<p>
    <input type="text" name="voornaam">
    <p>Email adres<p>
    <input type="text" name="email">
    <input type="submit" value="Verzenden">
</form>
</body>
</html>