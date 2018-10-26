<?php
    session_unset();
    session_start();
    $_SESSION['login'] = 3;
    echo 'logging out..'
?>

<meta http-equiv="refresh" content="1; URL='index.php'"/>