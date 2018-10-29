<?php 
include 'head.php';
?>
<body>
<?php 
session_start();
$_SESSION['login'] = 3;
?>
<div class="container">
    <?php include 'navigate.php'; ?>
    <form action="verify.php" method="post">
        <div class="form-group" style="max-width: 25%">
            <p>User: </p> <input type="text" name="user" class="form-control">
        </div>
        <div class="form-group" style="max-width: 25%">
            <p>Password: </p> <input type="password" name="passwd" class="form-control">
    </div>
        <input type="submit" value="Login" class="btn btn-primary">
    </form>
    <form action="logout.php" method="post">
        <div class="form-group">
        <input type="submit" value="Logout" class="btn btn-danger">
        </div>
    </form>
</div>
</body>
</html>