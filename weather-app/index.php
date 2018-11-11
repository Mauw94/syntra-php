<?php
include 'headers.php';

function checkNightDay($desc) {
    if (strpos($desc, "Dusk") !== false) {
        echo 'Dusk';
        echo '<i class="fas fa-sunset"></i>';
    }
    else if (strpos($desc, "Dawn") !== false) {
        echo 'Dawn';
        echo '<i class="fas fa-sunrise fa-1x"></i>';
    }
    else if (strpos($desc, "Night_Time") !== false) {
        echo 'Night Time';
        echo '<i class="fas fa-moon fa-1x"></i>';
    } else if (strpos($desc, "Dry") !== false) {
        echo 'Dry';
    }
}
function convertToCelc($temp) {
    $celc = ($temp - 32) * 5/9;
    return $celc;
}
?>
<body>
<div class="main container">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
        <form action="" method="post">
            <div class="form-group">
                <i class="fas fa-feather-alt fa-10x"></i>
                <label for=""> </label>
                <input type="text" name="plaats" placeholder="plaats" class="form-control">
                <button type="submit" class="btn btn-default">Zoek <i class="fa fa-map-marker"></i></button>
            </div>
        </form>

        <?php
        if (!empty($_POST['plaats'])) {
            $plaats = $_POST['plaats'];
            $json = file_get_contents('http://api.oceandrivers.com:80/v1.0/getWeatherDisplay/' . strtolower($plaats) . '/?period=latestdata');
            $json = json_decode($json);
            //print_r($json);
            $temperature = $json->TEMP_IN;
            $tempCelc = convertToCelc($temperature);
            $rain = $json->RAIN;
            $description = $json->WEATHER_DES;
        ?>
        <div class="card">        
            <div class="card-header">
                <strong class="card-title mb-3">Weather App</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <h5 class="location text-sm-center mt-2 mb-1">
                    <i class="fa fa-map-marker"></i>
                    <?php echo ' '.strtoupper($plaats) ?></h5>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                    <p>Temperatuur: <?php echo round($tempCelc, 1)?> graden</p>
                    <p>Beschrijving: <?php checkNightDay($description); ?></p>
                    <p><?php                     
                    if ($rain) {
                        ?><i class="fas fa-cloud-sun-rain fa-3x"></i>
                    <?php } else {
                        ?> <i class="fas fa-sun fa-3x"></i>
                    <?php }
                    ?></p>                   
                </div>
            </div>
        </div>
        <?php
        } else {
            echo "Enter a location";
        }
        ?>
    </div>
</div>
</body>
<!-- <i class="fas fa-sun"></i>
<i class="fas fa-cloud"></i>
<i class="fas fa-cloud-sun"></i>
<i class="fas fa-cloud-sun-rain"></i>
<i class="fas fa-cloud-showers-heavy"></i> -->