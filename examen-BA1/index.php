<?php
include "navigate.php";
?>

<form action="process.php" method="post">
    <label>Naam: </label>
    <input type="text" name="naam" required>
    <label>Voornaam: </label>
    <input type="text" name="voornaam" required>
    <label>Geluksgetal: </label>
    <input type="text" name="geluksgetal" required>
    <input type="submit" value="verzenden">
</form>