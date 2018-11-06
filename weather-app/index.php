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
        ?>
        <div class="card">        
            <div class="card-header">
                <strong class="card-title mb-3">Weather App</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <i class="fas fa-sun"></i>
                    <i class="fas fa-cloud"></i>
                    <i class="fas fa-cloud-sun"></i>
                    <i class="fas fa-cloud-sun-rain"></i>
                    <i class="fas fa-cloud-showers-heavy"></i>
                    <h5 class="text-sm-center mt-2 mb-1">Het weer: </h5>
                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i><?php echo ' '.strtoupper($plaats) ?></div>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                    <p>weer1</p>
                    <p>weer2</p>
                    <p>weer3</p>
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