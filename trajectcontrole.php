<?php

// aantal seconden tussen punt 1 en 2
$punt_1 = 0;
$punt_2 = 17;
$snelheid = 0;
$boete = false;
define('MAX_SNELHEID', 70);
define('AFSTAND', 1200);

$snelheid = AFSTAND / ($punt_1 + $punt_2);

if ($snelheid > MAX_SNELHEID) {
    $boete = true; 
}
echo $snelheid;

?>