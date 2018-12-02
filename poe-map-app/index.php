<?php
include "conn.php";
include "map-manager.php";

/*
*   SETUP
*/
$mapManager = new MapManager($con);
$tiers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];

/*
*   Get maps by a their tiers
*/
for ($tier = 0; $tier < count($tiers); $tier++) {
    $maps = null;
    $maps = $mapManager->getMapsByTier($tier);
    echo '<br><br><strong>Tier ' . $tier . ' maps: </strong><br>';
    foreach ($maps as $map) {
        echo $map->name . '<br>';
    }
}

/*
*   Get all the unique maps
*/
echo '<br><br><strong>Unique maps:</strong><br>';
$mapsUnique = $mapManager->getAllUniqueMaps();
foreach ($mapsUnique as $map) {
    echo $map->name . ' TIER ' . $map->tier . '<br>';
}
?>