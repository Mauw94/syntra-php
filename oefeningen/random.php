<?php

$randomCharacter = array();

for ($i = 0; $i < 5; $i++) {
    $rand = rand(65, 90);
    array_push($randomCharacter, chr($rand));
}

foreach ($randomCharacter as $char) {
    echo $char . "<br>";
}

?>