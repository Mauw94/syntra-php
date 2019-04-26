<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var city = 'Amsterdam';
    $.getJSON("http://api.openweathermap.org/data/2.5/weather?q="+city+"&appid=a2290d68d4d1c2d036933601ecb0dc5e").done(function(data) {
        var kelvin = data['main']['temp'];
        var temp = kelvin - 273.15;
        temp = temp.toFixed(1);

        console.log(data);

        $("#temp").append('Temperatuur: ' + temp + ' graden');
    });
    $(".red").click(function() {
        console.log('clicked');
        $(this).css("background-color", "green");
    })
});
</script>

</head>
<body>
    <div class="container">
        <div class= "row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="red btn">
                    maak groen
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="red btn">
                    maak groen
                </div>
            </div>
            <div class="col-md-4">
                <div id="temp">
                    
                </div>    
            </div>
            <div class="col-md-4">
                <div class="red btn">
                    maak ground
                </div>
            </div>
        </div>
        <div class= "row">
            <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="red btn">
                        maak groen
                    </div>
                </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>