<?php

include_once(__DIR__ . '/includes/Db.php');
include_once (__DIR__ . '/includes/nav.php');
include_once(__DIR__ . "/includes/checkSession.php");

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
            <h5 class="card-title">23°C</h5>
        </div>
    </div>

    <div class="card text-dark bg-light mb-3 text-center" style="max-width: 18rem;">
        <div class="card-header">Humidity</div>
        <div class="card-body">
            <h5 class="card-title">40%</h5>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>