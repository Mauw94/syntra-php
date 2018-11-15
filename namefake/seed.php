<?php
include "conn.php";

$context = stream_context_create(array(
    'http' => array(
        'header' => 'Content-Type: application/json'
        ),
    'ssl' => array(
        'verify_peer'      => false,
        'verify_peer_name' => false,
        ),
    )
);
$person = file_get_contents("https://api.namefake.com/", FALSE, $context);
$person = json_decode($person);
//print_r($person);

$name = $person->name;
$address = $person->address;
$phone = $person->phone_h;
$email = $person->email_u;
$birth = $person->birth_data;
$username = $person->username;

$sql = "INSERT INTO personen VALUES(NULL, '$name', '$address', '$phone', '$email', '$birth', '$username')";
if (mysqli_query($con, $sql)) {
    echo "Generated a new person!";
    ?>
    <meta http-equiv="refresh" content="0.3; URL='index.php'"/>
    <?php
} else {
    echo "Something went wrong.";
}

?>