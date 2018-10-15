<?php

$first = 0;
$second = 1;
$total = 0;

for ($i = 0; $i < 100; $i++) {        
    echo ($total . '<br/>');
    $total = $first + $second;
    $first = $second;
    $second = $total;
}

?>