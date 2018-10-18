<!DOCTYPE html>
<html>
<head>
    <title>mijnCookie</title>
</head>
<body>
<form action="" method="get">

    Cookienaam: <input type="text" name="cookieNaam" required><br><br>
    Cookiewaarde: <input type="text" name="cookieWaarde" required><br>
    <input type="submit" name="ok" value="maak"><br><br>
    <p>- - - - - - - - - - - - - - - - - - - - - - -</p>
</form>
<?php
echo 'Opgeslagen cookies: ' . '<br>';
foreach ($_COOKIE as $key => $value) {
    echo $key . '<br>';
}
?>
<form action="" method="get">
    Search cookie by name: <input type="text" name="cookie" required><br>
    <input type="submit" name="cookiefinder" value="find">
</form>
</body>
</html>

<?php
if (isset($_GET['ok'])) {
    if (isset($_GET['cookieNaam'])) {
        $cookieNaam = $_GET['cookieNaam'];
        $cookieWaarde = $_GET['cookieWaarde'];
        $request_time = $_SERVER['REQUEST_TIME'];
        $waarde = $cookieWaarde . ' ' . $request_time;
        setcookie(strtolower($cookieNaam), strtolower($waarde), time() + (86400 * 3), '/');
    }
}

if (isset($_GET['cookiefinder'])) {
    $cookieNaam = strtolower($_GET['cookie']);
    if (!isset($_COOKIE[$cookieNaam])) {
        echo 'kan cookie niet vinden';
    } else {
        $cookie = explode(' ', $_COOKIE[$cookieNaam]);
        echo 'Aangemaakt: ' . date('l jS \of F Y h:i:s A', $cookie[count($cookie) - 1]);
    }
}

?>