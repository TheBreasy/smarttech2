<?php

include_once(__DIR__ . '/includes/Db.php');
include_once (__DIR__ . '/includes/nav.php');
include_once(__DIR__ . "/includes/checkSession.php");


    $page = $_SERVER['PHP_SELF'];
    $sec = "5";
    header("Refresh: $sec; url=$page");


    $conn = Db::getConnection();
    $statement = $conn->prepare('SELECT * FROM dht11 ORDER BY date desc LIMIT 1'); //haal de laatst gemeten temperatuur en vochtigheid op
    $statement->execute();
    $result = $statement->fetchAll();
    $currTemp = $result[0]['temperature'];
    $currHumidity = $result[0]['humidity'];

    $statement = $conn->prepare('SELECT * FROM users_settings ORDER BY date desc LIMIT 1'); //haal de user settings op
    $statement->execute();
    $result = $statement->fetchAll();
    $minTemp = $result[0]['min_temperature'];
    $maxTemp = $result[0]['max_temperature'];
    $minHumidity = $result[0]['min_humidity'];
    $maxHumidity = $result[0]['max_humidity'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Smart tech 2 | dashboard</title>
</head>
<body>
<div class="vw-70 m-auto mt-5">

    <div class="text-center mb-5">
        <h2><?php echo "Welcome, " . $_SESSION['username'] ?></h2>
    </div>

    <div class="card text-dark bg-light mb-3 text-center" style="max-width: 18rem;">
        <div class="card-header">Temperature</div>
        <div class="card-body">
<!--            Wanneer de huidige temperatuur hoger is dan de max-temperatuur setting, wordt de tekst rood en wanneer het lager is dan de min-temperatuur setting, wordt het cyan.-->
<!--            Indien het binnen de settings waarden bevindt, is de tekst gewoon zwart.-->
            <h5 class="card-title" style="<?php echo $currTemp>$maxTemp ? "color: red" : ($currTemp<$minTemp? "color: cyan":"color: black")?>"><?php echo $currTemp;?>°C</h5>
        </div>
    </div>

    <div class="card text-dark bg-light mb-3 text-center" style="max-width: 18rem;">
        <div class="card-header">Humidity</div>
        <div class="card-body">

<!--            Wanneer de huidige vochtigheid hoger is dan de max-vochtigheid setting, wordt de tekst blauw en wanneer het lager is dan de min-vochtigheid setting, wordt het oranje.-->
<!--            Indien het binnen de settings waarden bevindt, is de tekst gewoon zwart.-->
            <h5 class="card-title" style="<?php echo $currHumidity>$maxHumidity ? "color: blue" : ($currHumidity<$minHumidity? "color: orange":"color: black")?>"><?php echo $currHumidity;?>%</h5>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>