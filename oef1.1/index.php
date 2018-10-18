<?php
session_start();
session_unset();
?>
<html>
<head></head>
<body>
    <form action="check.php" method="post">
        <p>Secure Area</p>
        <p><input type="password" name="passwd"></p>
        <p><input type="submit" name="login" value="login"></p>
    </form>
</body>
</html>