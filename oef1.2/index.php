<?php
session_unset();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
</head>
<body>
    <form action="check.php" method="post">
        <p><input type="text" name="username"></p>
        <p><input type="password" name="passwd"></p>
        <p><input type="submit" value="login" name="login"></p>
    </form>    
</body>
</html>