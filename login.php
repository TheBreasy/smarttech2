<?php

include_once('./includes/Db.php');
session_start();
session_destroy();

if(!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = Db::getConnection();
    $statement = $conn->prepare('SELECT * FROM users');
    $statement->execute();
    $result = $statement->fetchAll();

    foreach($result as $user) {
        if($email === $user['email'] && $password === $user['password']) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $email;

            header('Location: index.php');
        }
    }
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
    <title>Smart tech 2 | login</title>
</head>
<body>

<div class="vw-70 m-auto mt-5">
    <div class="text-center mb-5">
        <h2>Login</h2>
    </div>

    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="mt-3">
        <a href="register.php">Don't have an account? Register here</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>