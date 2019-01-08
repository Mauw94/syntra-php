<!DOCTYPE html>
<html>
<head>
    <title>Reisbureau</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="klok.js"></script>
</head>
<body onload="startTime()">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" style="color:white">Reisbureau TE1</a>
            </div>
            <ul class="nav navbar-nav" style="float:right">
                <li><a style="color:white" id="klok"></a></li>
            </ul>
        </div>
    </nav>
    <?php
    $json = file_get_contents("pakketten.json");
    $json = json_decode($json, true);
    ?>
    <div class="container content">
        <div class="table-responsive">
            <table class="table table-striped">
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
        </div>
    </div>
</body>
</html>