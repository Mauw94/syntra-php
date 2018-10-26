<?php
include 'navigate.php';
include 'session-manager.php';
$sessionManager = new SessionManager();
$users = [
    'admin' => ['0', 'admin'],
    'user' => ['2', 'user'],
    'trainee' => ['1', 'trainee']
];
$correctPasswd = false;
$passwd = $_POST['passwd'];
$user = $_POST['user'];

if (array_key_exists($user, $users)) {
    if ($passwd = $users[$user][1]) {
        echo 'password correct';
        $_SESSION['login'] = $users[$user][0];
        $_SESSION['user'] = $user;
        $correctPasswd = true;
    } else {
        $_SESSION['login'] = 'nologin';
        echo 'password is wrong, please try again';
    }
} else {
    echo 'User does not exist';
}
?>
<!DOCTYPE html>
<html>
<head>
<?php if ($correctPasswd) { ?>
    <meta http-equiv="refresh" content="1; URL='input.php'"/>
<?php 
} ?>
</head>
<body>
</body>
</html>