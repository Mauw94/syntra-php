<?php
$a = 2;
function vars($a, $b)
{
    $result = $a + $b;
    return $result;
}

echo vars(4, 10) . '<br><br><br>';

$naam = 'mauCookie';
$waard = 'whatever';

setcookie($naam, $waard, time() + (86400 * 2), '/');

if (!isset($_COOKIE['mauCookie'])) {
    echo 'Fout bij aanmaken cookie';
} else {
    echo $_COOKIE['mauCookie'] . ' werd uitgelezen van de cookie' . '<br><br>';
}

#print_r($_SERVER);
foreach ($_SERVER as $key => $value) {
    echo $key . ':' . $value . '<br>';
}
?>