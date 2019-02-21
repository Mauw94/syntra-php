<?php
    $totalPrice = $_SESSION['totalPrice'];
    $_SESSION['orderId'] = $orderId;

?>

<div class="container menu-container">
    <?php

    echo "Hier komt Mollie<br><br>"; 
    echo "Totaal bedrag: &euro;".$totalPrice."<br><br><br>";

    echo "Your order number is: ".$orderId;
    ?>
</div