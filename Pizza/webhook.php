<?php
include 'conn.php';
require_once 'Mollie/API/Autoloader.php';

$mollie = new Mollie_API_Client;
$mollie->setApiKey('test_sPbAPBRhEM6QUH3AK5Rvneufjfq4zk');

$payment    = $mollie->payments->get($_POST["id"]);

/*
 * The order ID saved in the payment can be used to load the order and update it's
 * status
 */
$order_id = $payment->metadata->order_id;
$ordernummer = $payment->metadata->ordernummer;
if ($payment->isPaid())
{
$query = "UPDATE bestelling SET payment = 1 WHERE ordernummer='$ordernummer'";
mysqli_query($conn,$query);
}
elseif (! $payment->isOpen())
{
    /*
     * The payment isn't paid and isn't open anymore. We can assume it was aborted.
     */
}


?>