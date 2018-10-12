<?php

$a = 1;
$b = 1;
$c = 0;

echo ('with a 2 for loops <br/> <br/>');

for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($b > 10) {
            $b = 1;
        }
        $c = $a * $b;
        echo ($a . ' * ' . $b . ' = ' . $c . '<br/>');
        $b++;
    }
    $a++;
}


// echo ('<br/> <br/> with a while and for loop <br/> <br/>');

// $a = 1;
// $b = 1;
// while ($a <= 10) {
//     for ($i = 0; $i < 10; $i++) {
//         if ($b > 10) {
//             $b = 1;
//         }
//         $c = $a * $b;
//         echo ($a . ' * ' . $b . ' = ' . $c . '<br/>');
//         $b++;
//     }
//     $a++;
// }

?>