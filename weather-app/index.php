<?php
include 'headers.php';
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
        if (isset($_POST['plaats'])) {
            $plaats = $_POST['plaats'];
            $json = file_get_contents('http://api.oceandrivers.com:80/v1.0/getWeatherDisplay/' . strtolower($plaats) . '/?period=latestdata');
            $json = json_decode($json);
            //print_r($json);
            $temperature = $json->TEMPERATURE;
            $rain = $json->RAIN;
            $description = $json->WEATHER_DES;
        ?>
        <div class="card">        
            <div class="card-header">
                <strong class="card-title mb-3">Weather App</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <!-- <i class="fas fa-sun"></i>
                    <i class="fas fa-cloud"></i>
                    <i class="fas fa-cloud-sun"></i>
                    <i class="fas fa-cloud-sun-rain"></i>
                    <i class="fas fa-cloud-showers-heavy"></i> -->
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
            echo "";
        }
        ?>
    </div>
</div>
</body>