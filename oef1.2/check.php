<?php
session_start();
$users = [
    'root' => ['0', '123'], 'admin' => ['1', 'admin'],
    'user' => ['2', 'user']
];
$correctPasswd = false;
$passwd = $_POST['passwd'];
$username = $_POST['username'];

if (array_key_exists($username, $users)) {
    if ($passwd == $users[$username][1]) {
        echo 'wachtwoord is correct ';
        $_SESSION['login'] = "ok";
        $_SESSION['level'] = $users[$username][0];
        $_SESSION['password'] = $passwd;
        $_SESSION['gebruiker'] = $username;
        $correctPasswd = true;

    } else {
        $_SESSION['login'] = "niet ok";
        echo 'Wachtwoord is fout, u heeft geen toegang';
    }
} else {
    echo 'Gebruiker bestaat niet';
}
?>
<!DOCTYPE html>
<html>
<head>
<?php if ($correctPasswd) { ?>
    <meta http-equiv="refresh" content="1; URL='secure.php'"/>
<?php 
} ?>

</head>
<body>
<!-- <?php
// if ($correctPasswd) { ?>
//     <a href="secure.php">ga door naar de gebruiker pagina</a>
// <?php 
// }
// ?> -->
    
</body>
</html>