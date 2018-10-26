<?php
    include 'navigate.php';
    include 'session-manager.php';
    $sessionManager = new SessionManager();
    $accessLevel = $sessionManager->getAccessLevel();
    
    if ($accessLevel == 0) { ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Cafeteria</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <body>
            <h2>List of all orders</h2>
        </body>
        </html>
    <?php } else {
        echo 'No access';
    }
?>