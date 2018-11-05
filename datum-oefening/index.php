// 2 invulvelden, 2data, bereken het verschil tussen 
// deze data. Verschil tussen data = jaren maanden dagen
// maak gebruik van DateTime class! en instantieer!

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
    <input type="submit" value="Bereken verschil">
    </form>
</body>
</html>

<?php
if (isset($_POST['date1']) && isset($_POST['date2'])) {
    $d1 = $_POST['date1'];
    $d2 = $_POST['date2'];
    $date1 = new DateTime($d1);
    $date2 = new DateTime($d2);

    $diff = $date1->diff($date2);
    echo "difference " . $diff->y . ' years ' . $diff->m . ' months ' . $diff->d . ' days ';
}
?>