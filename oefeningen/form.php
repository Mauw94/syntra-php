<!DOCTYPE html>
<html>
<head>
    <title>mijnBestel</title>
    <style>
    h4 {
    width: 12%;
    background-color: red;
    padding: 20px;
    border-radius: 11px;
    color: white;
    font-family: arial;
    font-size: 17px;
    display: block;
    text-align: center;
    }
    </style>
</head>
<body>
<?PHP
function toegang()
{
    if ($_GET['leeft'] < 16) {
        echo "speeltuin";
    } elseif ($_GET['leeft'] < 19 && $_GET['leeft'] > 15) {
        echo "Party: BEER";
    } else {
        echo "Party: BEER/TEQUILA";
    }
}
function checkvip()
{
    if ($_GET['kamer'] > 199) {
        echo "VIP";
    }
}
// check als naam leeg is: open/sluit de php code! php
// kan enkel worden uitgevoerd tussen de tagjes!
if (!empty($_GET['naam'])) {
    $naam = $_GET['naam'];
    $vnaam = $_GET['vnaam'];
    $leeft = $_GET['leeft'];
    $kamer = $_GET['kamer'];
    ?>
    <h2>Ticket LoungeResort Playa grande</h2>
    <p>Naam: <?PHP echo $naam; ?></p>
    <p>Voornaam: <?PHP echo $vnaam; ?></p>
    <p>Locatie: <?PHP toegang(); ?></p>
    <p><h4><?PHP checkvip(); ?></h4></p>
    <?PHP // print_r($_GET) // assoc array diagnose ?>
    <p>- - - - - - - - - - - - - - - - - - - - - - - -</p> 
    <h2>Voucher</h2>
    <p><?PHP toegang(); ?></p>
<?PHP 
} else {
    ?>
<form action="" method="get">
    <p>Naam: <input type="text" name="naam" required></p>
    <p>Voornaam: <input type="text" name="vnaam"></p>
    <p>Leeftijd: <input type="number" name="leeft" required></p>
    <p>Datum: <input type="date" name="datum"></p>
    <p>Kamer: <input type="number" name="kamer"></p>
    <input type="submit" value="Druk ticket">
</form>
<?PHP 
} ?>
</body>
</html>