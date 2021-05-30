<?php

include_once(__DIR__ . '/includes/Db.php');
include_once (__DIR__ . '/includes/nav.php');
include_once(__DIR__ . "/includes/checkSession.php");

    $conn = Db::getConnection();
    $statement = $conn->prepare('SELECT * FROM users_settings ORDER BY date desc LIMIT 1');
    $statement->execute();
    $result = $statement->fetchAll();
    $minHumidity = $result[0]['min_humidity'];
    $maxHumidity = $result[0]['max_humidity'];
    $minTemperature = $result[0]['min_temperature'];
    $maxTemperature = $result[0]['max_temperature'];


    if(!empty($_POST)) {
            $minHumidity = $_POST['minHum'];
            $maxHumidity = $_POST['maxHum'];
            $minTemperature = $_POST['minTemp'];
            $maxTemperature = $_POST['maxTemp'];

            $conn = Db::getConnection();
            $statement = $conn->prepare('INSERT INTO users_settings (min_humidity, max_humidity, min_temperature, max_temperature) VALUES (:minHum, :maxHum, :minTemp ,:maxTemp)');
            $statement->bindValue(':minHum', $minHumidity);
            $statement->bindValue(':maxHum', $maxHumidity);
            $statement->bindValue(':minTemp', $minTemperature);
            $statement->bindValue(':maxTemp', $maxTemperature);
            $statement->execute();

            header('Location: index.php');
        }
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
    <title>Smart tech 2 | settings</title>
</head>
<body>
<div class="vw-70 m-auto mt-5">

    <form method="post">
        <div class="mb-3">
            <label for="minTemp" class="form-label">Set minimum temperature</label>
            <input type="text" class="form-control" id="minTemp" name="minTemp" value="<?php echo $minTemperature?>">
        </div>
        <div class="mb-3">
            <label for="maxTemp" class="form-label">Set maximum temperature</label>
            <input type="text" class="form-control" id="maxTemp" name="maxTemp" value="<?php echo $maxTemperature?>">
        </div>
        <div class="mb-3">
            <label for="minHum" class="form-label">Set minimum humidity</label>
            <input type="text" class="form-control" id="minHum" name="minHum" value="<?php echo $minHumidity?>">
        </div>
        <div class="mb-3">
            <label for="maxHum" class="form-label">Set maximum humidity</label>
            <input type="text" class="form-control" id="maxHum" name="maxHum" value="<?php echo $maxHumidity?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>