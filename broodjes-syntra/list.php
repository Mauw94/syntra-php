<?php
    include 'database.php';
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
            <?php
                $sql = "SELECT * FROM broodje ORDER BY besteldatum ASC";
                $result = mysqli_query($con, $sql);
                #print_r($result);
                while ($output = mysqli_fetch_assoc($result)) {
                    echo '<br>'.$output['soort'] . ' ' . $output['brood'] . ' ' . $output['groenten'] . ' ' . $output['saus'] . '<br>';
                }
            ?>
        </body>
        </html>
    <?php } else {
        echo 'No access';
    }
?>