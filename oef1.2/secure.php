<?php
session_start();
$user = $_SESSION['gebruiker'];
$level = $_SESSION['level'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="Chrome">
    <title>User Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    if ($user == 'root') { ?>
        <p>Welcome, root</p>
        <p>Access level: <?php echo $level; ?></p>
    <?php 
} elseif ($user == 'admin') { ?>
        <p>Welcome, admin</p>
        <p>Access level: <?php echo $level; ?></p>
    <?php 
} else { ?>
        <p>Welcome user</p>
        <p>Access level: <?php echo $level; ?></p>
    <?php 
}
?>
</body>
</html>