<?php
    include 'database.php';
    include 'session-manager.php';
    include 'head.php';
    $sessionManager = new SessionManager();
    $accessLevel = $sessionManager->getAccessLevel();

    if ($accessLevel == 0) { ?>
        <body>
        <div class="container">
        <?php 
        include 'navigate.php'; 
        $today = date("Y-m-d");
        ?>
            <h2>orderlist <?php echo $today; ?></h2>
            <?php              
                $sql = "SELECT * FROM broodje WHERE besteldatum = '$today'";
                $result = mysqli_query($con, $sql);
                echo '<table class="table">';
                echo '<tr><th>Soort</th><th>Brood</th><th>Groenten</th><th>Saus</th>
                <th>Besteldatum</th><th>Bestelnr</th><th>Afgehaald?</th><th>Update</th><th>Archiveer</th>
                <th>Klant-details</th></tr>';
                while ($output = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $output['soort'] . '</td>';
                    echo '<td>' . $output['brood'] . '</td>';
                    echo '<td>' . $output['groenten'] . '</td>';
                    echo '<td>' . $output['saus'] . '</td>';
                    echo '<td>' . $output['besteldatum'] . '</td>';
                    echo '<td>' . $output['bestelnr'] . '</td>';
                    ?>
                    <form action="afgehandeld.php" method="post">
                    <input type="hidden" name="id" value="<?php  echo $output['id'] ?>">
                    <td><input type="checkbox" name="afgehaald" <?php if ($output['afgehaald'] == 1)  echo "checked='checked'" ?>"></td>
                    <td><input type="submit" value="update" class="btn btn-success"></td>
                    </form>
                    <form action="archive.php" method="post">
                    <input type="hidden" name="id" value="<?php  echo $output['id'] ?>">
                    <td><input type="submit" name="archiveer" value="archiveer" class="btn btn-primary"></td>
                    </form>
                    <form action="klant-details.php" method="post">
                    <input type="hidden" name="id" value="<?php  echo $output['id'] ?>">
                    <td><input type="submit" value="Klant details" class="btn btn-warning"></td>
                    </form>
                    <?php
                    echo '</tr>';
                }
                echo '</table>';
            ?>
            </div>
        </body>
        </html>
    <?php } else {
        echo 'No access';
    }
?>