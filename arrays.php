<?PHP
$aNamen = ['jan', 'piet', 'joris', 'corneel'];
$aLeeftijd = [20, 30, 40, 35];
// echo $aNamen; Dit kan niet!
// print_r($aNamen);
// echo $aNamen[1]; // output met de index

// data toevoegen aan een enkelvoudige array
$aNamen[] = 'henk';
$aNamen[] = 'donald';
array_push($aNamen, 'hilary', 'obama');

// iteriatie van een enkelvoudige array
foreach ($aNamen as $aNaam) {
    echo $aNaam . "<br>";
}
// nog een array manier
$aFruit = array('appels', "peren", "citroenen");

// gebruik van associatieve arrays en hun iteriatie
$aFruitStock = ['appels' => 10, 'peren' => 20, 'citroenen' => 200];
echo $aFruitStock['appels'];
// toevoegen aan assoc array op deze manier
$aFruitStock['meloenen'] = 30;

foreach ($aFruitStock as $soort => $stock) {
    echo $soort . ": " . $stock . "<br>";
}
// oef met array
echo '<BR><BR><BR>';

$keuzeMan = [1, 4, 6, 8, 9];
$keuzeVrouw = [2, 8, 9];
$res = array_diff($keuzeMan, $keuzeVrouw);
$samen = array_diff($keuzeMan, $res);
print_r($res);
foreach ($samen as $resultaat) {
    echo $resultaat;
}
echo "<br><br>";
// Multidimensionale arrays
$bestemming = [
    'ibiza' =>
        [
        'ibizacity',
        'San Miguel',
        'San Miguel',
        'San Miguel',
        'San Miguel'
    ], 'mallorca' =>
        ['mallorcacity', 'San Mallorc']
];
print_r($bestemming);
?>