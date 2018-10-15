<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>form.php</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <script src="js/scripts.js"></script>
</head>

<body>
<?php
if (empty($_GET['naam'])) { ?> 
    <form action=""method="get">
        <p>Naam: <input type="text" name="naam" required></p>
        <p>Voornaam: <input type="text" name="voornaam"></p>
        <p>Leeftijd: <input type="number" name="leeftijd"></p>
        <p>Datum: <input type="date" name="datum"></p>
        <input type="submit" value="Druk ticket">
    </form>
<?php 
} else { ?> 
<h2>Ticket LoungeResort Playa Grande</h2>
<p>Naam: <?php echo $_GET['naam']; ?></p>
<p>Voornaam: <?php echo $_GET['voornaam']; ?></p>
<p>Leeftijd: 
<?php 
echo $_GET['leeftijd'];
$leeftijd = $_GET['leeftijd'];
?></p>
<?php if ($leeftijd >= 18) { ?> 
<p><?php echo $_GET['naam']; ?> mag tequilla drinken </p>
<?php 
} elseif ($leeftijd >= 16) { ?>
<p><?php echo $_GET['naam']; ?> mag bier drinken. </p>
<?php 
} else { ?>
<p><?php echo $_GET['naam']; ?> mag geen alcohol. </p>
<?php 
}
} ?>
</body>
</html>
