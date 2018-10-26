<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Broodjes-Syntra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include 'navigate.php'; ?>
    <form action="verify.php" method="post">
        <p>User: </p> <input type="text" name="user">
        <p>Password: </p> <input type="password" name="passwd">
        <input type="submit" value="Login">
    </form>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>