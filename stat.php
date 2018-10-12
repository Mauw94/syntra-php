<?php
$a = 5;
$b = 10;

$tijd = date("12:00:00");

if ($tijd > date("00:00:00") && $tijd < date("12:00:00")) {
    echo ('goeiemorgen');
} elseif ($tijd >= date("12:00:00") && $tijd < date("18:00:00")) {
    echo ('goeiemiddag');
} else { 
    echo ("goeieavond");
}

?>