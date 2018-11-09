<?php

$json = file_get_contents('profielen.json');
$json = json_decode($json, true);
print_r($json);
echo '<br><br>';
for ($i = 0; $i < count($json); $i++) {
    echo 'x locatie '. $json['person'][$i]['geo-coordinates'][0]. ' y locatie ' .$json['person'][$i]['geo-coordinates'][1] .'<br>';
    // echo $json['paard'][$i]['naam'].'<br>';
}
echo '<br>';
for ($i = 0; $i < count($json); $i++) {
    echo 'paard ' . $json['paard'][$i]['naam'];
    echo ' leeftijd ' . $json['paard'][$i]['leeftijd'].'<br>';
}

// oplossing massimo
// foreach ($oLotrs[0] as $lotr) {
 
//     foreach ($lotr as $lot) {
    
//     echo $lot['name'];
      
//     }
//   }
  
  
//   foreach ($oLotrs[1] as $lotr) {
   
//     foreach ($lotr as $lot) {
    
//     echo $lot['name'];
      
//     }
//   }
?>
