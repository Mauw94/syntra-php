<?php
include 'headers.php';

$dusk = false;
$dawn = false;
$night_time = false;

function checkNightDay($desc) {
    if (!strpos($desc, "Dusk")) {
        $dusk = true;
    }
    if (!strpos($desc, "Dawn")) {
        $dawn = true;
    }
    if (!strpos($desc, "Night-Time")) {
        $night_time = true;
    }
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
            $temperature = $json->TEMPERATURE;
            $rain = $json->RAIN;
            //$description = $json->WEATHER_DES;
            $description = "Night_Time";
            checkNightDay($description);
            echo $dusk;
        ?>
        <div class="card">        
            <div class="card-header">
                <strong class="card-title mb-3">Weather App</strong>
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
                    <p>Temperatuur: <?php echo $temperature ?></p>
                    <p>Beschrijving: <?php echo $description ?></p>
                    <p><?php 
                    if ($rain) {
                        ?><i class="fas fa-cloud-sun-rain fa-5x"></i>
                    <?php } else {
                        ?> <i class="fas fa-sun fa-2x"></i>
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