<?php
session_start();
$passwd = $_POST['passwd'];
if ($passwd == "welcome") {
    echo 'wachtwoord juist<br>';
    $_SESSION['login'] = "ok";
    $_SESSION['wachtwoord'] = $passwd;
} else {
    $_SESSION['login'] = "niet ok";
    echo 'wachtwoord fout, u heeft geen toegang';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <a href="secure.php">Ga naar secure pagina</a>
</body>
</html>