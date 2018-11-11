<?php
// 2 invulvelden, 2data, bereken het verschil tussen 
// deze data. Verschil tussen data = jaren maanden dagen
// maak gebruik van DateTime class! en instantieer!
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DateTime oef</title>
</head>
<body>
    <form method="post">
    <input type="date" name="date1">
    <input type="date" name="date2">
    <input type="submit" value="Bereken verschil" name="submit">
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $sdate = new DateTime($_POST['date1']);
    $edate = new DateTime($_POST['date2']);

    $diff = $sdate->diff($edate);
    echo "difference " . $diff->y . ' years ' . $diff->m . ' months ' . $diff->d . ' days ';
}
?>