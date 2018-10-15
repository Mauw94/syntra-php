<!doctype html>
<html>
<head>
    <title>form.php</title>
</head>
<body>
<?php 
function toegang()
{
    if ($_GET['leeftijd'] < 16) {
        echo 'speeltuin';
    } elseif ($_GET['leeftijd'] < 19 && $_GET['leeftijd'] > 15) {
        echo 'Party: BEER';
    } else {
        echo 'Party: BEER/TEQUILA';
    }
}

if (!empty($_GET['naam'])) {
    $naam = $_GET['naam'];
    $vnaam = $_GET['vnaam'];
    $leeftijd = $_GET['leeftijd'];
    ?>
    <h2>Ticket LoungeResort Playa Grande</h2>
    <p>Naam: <?php echo $naam; ?></p>
    <p>Voornaam: <?php echo $vnaam; ?> </p>
    <p>Locatie: <?php toegang(); ?> </p>
    <p>-----------------------------------------------</p>
    <h2>Voucher</h2>
    <p><?php toegang(); ?></p>
<?php 
} else {
    ?>
<form action="" method="get">
    <p>Naam: <input type="text" name="naam" required></p>
    <p>Voornaam: <input type="text" name="vnaam"></p>
    <p>Leeftijd: <input type="number" name="leeftijd" required></p>
    <p>Datum: <input type="date" name="datum"></p>
    <input type="submit" value="Druk ticket">
</form>
<?php 
} ?>
</body>
</html>