<?php
include 'session-manager.php';
include 'head.php';
$sessionManager = new SessionManager();
$accessLevel = $sessionManager->getAccessLevel();
$time = date("h:i:sa");

if ($accessLevel <= 2) { 
    if ($time < '13:00:00pm') {
    ?>
<body>
<div class="container">
<?php include 'navigate.php'; ?>
    <form action="insert.php" method="post">
        <h2>Broodjes</h2>
        <div class="form-group">
            <p>Broodje </p><select name="soort">
                <option value="kaas">Kaas</option>
                <option value="martino">Martino</option>
                <option value="smos">Smos</option>
            </select>
            <p>Groenten </p> <input type="text" name="groenten">
            <p>Brood </p> <select name="brood">
                <option value="wit">Wit</option>
                <option value="grijs">Grijs</option>
                <option value="bruin">Bruin</option>
            </select>
            <p>Saus </p> <input type="text" name="saus">
            <p>Aantal </p> <input type="text" name="aantal">
        </div>
        <h2>Gegevens</h2>
        <div class="form-group">
            <p>Naam </p> <input type="text" name="naam">
            <p>Tel </p><input type="text" name="tel">
            <p>E-mail </p><input type="text" name="email">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
</body>
</html>
<?php 
} else {
    echo 'Too late to order';
}
    } else {
        echo 'No access';
    }
?>