<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>overzicht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<?php
include 'database.php';

$sql = "SELECT * FROM wzp_tourmaster_order_test";
$result = mysqli_query($con, $sql);
?>
<body>
<table class="table">
<tr>
    <th>Booking date</th>
    <th>Travel date</th>
    <th>First name</th>
    <th>Last name</th>
    <th>E-mail</th>
    <th>Country</th>
    <th>Total price</th>
    <th>Total people</th>
    <th>Travellers</th>
</tr>
<tr>
<?php
while ($output = mysqli_fetch_assoc($result)) {
    $contactinfo = json_decode($output['contact_info']);
    $bookingdetail = json_decode($output['booking_detail']);
    $traveller_amount = count($bookingdetail->traveller_first_name);
    echo '<td>' . $output['booking_date'].'</td>';
    echo '<td>' . $output['travel_date'].'</td>';
    echo '<td>'. $contactinfo->first_name . '</td>';
    echo '<td>'. $contactinfo->last_name . '</td>';
    echo '<td>'. $contactinfo->email . '</td>';
    echo '<td>'. $contactinfo->country . '</td>';
    echo '<td>' . round($output['total_price'], 2) . ' EUR'. '</td>';
    echo '<td>' . $traveller_amount . '</td>';
    echo '<td>';
    for ($i = 0; $i < $traveller_amount; $i++) {
        echo  strtoupper($bookingdetail->traveller_first_name[$i]) . ' ' . strtoupper($bookingdetail->traveller_last_name[$i]) . ' | ';
    }
    echo '</td>';
    echo '</tr>';
}
?>
</tr>
</table>
</body>
</html>