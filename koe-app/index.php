<!DOCTYPE html>
<html>
<head>
    <title>Welkom, boer Jan</title>
<head>
<body>
<h1>Koeien</h1>
<?PHP include 'navigate.php'?>
<p>Geef de gegevens in van je koe: </p>
<form action="insert.php" method="post">
    <p>Naam<p>
    <select name="naam">
        <option value="bella">Bella</option>
        <option value="marie-fleure">Marie-Fleure</option>
        <option value="germaine">Germaine</option>
    </select>
    <p>Liters melk<p>
    <input type="number" name="melk">
    <p>Datum<p>
    <input type="date" name="date">
    <p>Opmerking</p>
    <input type="text" name="opmerking">
    <input type="submit" value="Verzenden">
</form>
</body>
</html>