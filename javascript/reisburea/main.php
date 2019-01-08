<!DOCTYPE html>
<html>
<head>
    <title>Reisbureau</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="header.css"/> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="klok.js"></script>
</head>
<body onload="startTime()">
    <ul>
        <li><a id="klok"></a></li>        
    </ul>
    <?php
    $json = file_get_contents("pakketten.json");
    $json = json_decode($json, true);
    ?>
    <table class="table">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Soort</th>
            <th>Boek</th>
        </tr>
    </thead> <?php
    foreach ($json['pakket'] as $value) { ?>
    <tbody>
        <tr>
            <td><?php echo $value['naam']; ?></td>            
            <td><?php echo $value['prijs']; ?></td>
            <?php
            if ($value['soort'] == 'strand') { ?>
                <td class="glyphicon glyphicon-asterisk"></td> <?php
            } else if ($value['soort'] == 'winter') { ?>
                <td class="glyphicon glyphicon-cloud"></td> <?php
            } else { ?>
                <td class="glyphicon glyphicon-cog"></td> <?php
            }
            ?>
            <td><button class="btn btn-primary">Boek nu</button></td>
        </tr>
    </tbody>
    <?php
    } ?>
    </table>
</body>
</html>