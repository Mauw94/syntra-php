<?php include 'conn.php';
require_once 'Mollie/API/Autoloader.php'; 
$mollie = new Mollie_API_Client;
$mollie->setApiKey('test_sPbAPBRhEM6QUH3AK5Rvneufjfq4zk');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input</title>
	<style>
		body {font-family:verdana}
		input {
			padding:10px;
			font-size:13px;
			border-radius:4px;
			display:block;
			border-style: solid;
    	border-color: #e2e2e2;
		}
		input:focus { 
    background-color: #e2e2e2;
		}
		
	</style>
</head>
<body>
	<h2>Uw pizza binnen het half uur na bestelling dampend voor uw deur!
	</h2>
	<form action="" method="post">
		<span>Naam: </span>
		<input type="text" name="naam">
		<span>Adres: </span>
		<input type="text" name="adres">
		<span>Gemeente: </span>
		<input type="text" name="gemeente">
		<span>Email: </span>
		<input type="email" name="email">
		<span>Aantal Lekkere Mega Pizza's: </span>
		<input type="number" name="aantal">
		<input type="submit" name="submit">
	</form>
<?php
if (isset($_POST['submit'])) {
	$sNaam=$_POST['naam'];
	$sAdres=$_POST['adres'];
	$sGemeente=$_POST['gemeente'];
	$sEmail=$_POST['email'];
	$iAantal=$_POST['aantal'];
	$iPayment = 0;
	$dTijdstip = date('Y-m-d');
	$dTijd = date('H:i:s');
	$iTotaal = ($iAantal*10)+2.5;
	$iOrdernummer = mktime();
	
	$query = "INSERT INTO bestelling VALUES ('NULL','$sNaam','$sAdres','$sGemeente','$sEmail','$iAantal','$iPayment','$dTijdstip','$dTijd','$iOrdernummer')";    
  if (mysqli_query($conn, $query)) {
	  		echo "Data prima doorgegeven";
			} else {
			  echo "fout bij verzenden";
			}
	
	try
{
    $payment = $mollie->payments->create(
        array(
            'amount'      => $iTotaal,
            'description' => 'Uw pizzabestelling nr: '.$iOrdernummer,
            'redirectUrl' => 'http://massimo-massimodn77912813.codeanyapp.com/pizza/completed.php/',
            'webhookUrl'  => 'http://massimo-massimodn77912813.codeanyapp.com/pizza/webhook.php/',
            'metadata'    => array(
                'naam' => $sNaam,
								'adres' => $sAdres,
								'gemeente' => $sGemeente,
								'email' => $sEmail,
								'ordernummer' => $iOrdernummer								
            ) 
        )
    );

    /*
     * Send the customer off to complete the payment.
     */
    header("Location: " . $payment->getPaymentUrl());
    exit;
}
catch (Mollie_API_Exception $e)
{
    echo "API call failed: " . htmlspecialchars($e->getMessage());
    echo " on field " . htmlspecialchars($e->getField());
}	
		}
mysqli_close($conn);
?>
</body>
</html>