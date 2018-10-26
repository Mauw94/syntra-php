<?php
include 'navigate.php';
include 'session-manager.php';
$sessionManager = new SessionManager();
$accessLevel = $sessionManager->getAccessLevel();

if ($accessLevel <= 1) { ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Input page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="insert.php" method="post">
        <h2>Broodjes</h2>
        <p>Broodje </p><select name="soort">
            <option value="kaas">Kaas</option>
            <option value="martino">Martino</option>
            <option value="smos">Smos</option>
        </select>
        <p>Groenten </p> <input type="text" name="groenten">
        <p>Brood </p> <select name="brood">
            <option value="wit">Wit</option>
            <option value="grijs">Grijs</option>
            <option value="bruin">Bruin</option>
        </select>
        <p>Saus </p> <input type="text" name="saus">
        <p>Aantal </p> <input type="text" name="aantal">
        <p>Nummber </p> <input type="text" name="nummer">

        <h2>Gegevens</h2>
        <p>Naam </p> <input type="text" name="naam">
        <p>Tel </p><input type="text" name="tel">
        <p>E-mail </p><input type="text" name="email">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php } else {
    echo 'No access';
}
?>