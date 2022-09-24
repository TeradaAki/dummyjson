<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://dummyjson.com/'
]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<div class="p-3 mb-2 bg-dark text-white">

    <form method="POST" action="user-login.php">
        <div class="form-floating m-5">
            <input type="username" class="form-control" id="username" name="username" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating m-5">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            <input class="btn btn-primary mx-auto m-4" type="submit" value="Submit" name="submit">
        </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        try {

            $users = [
                'json' => [
                    'username' => $_POST['username'],
                    'password' => $_POST['password']
                ]
            ];
            
            $response = $client->post('https://dummyjson.com/auth/login', $users);
            $code = $response->getStatusCode();
            $body = $response->getBody();
            $users = json_decode($body, true); ?>

            <div class="alert alert-success m-1" role="alert">
                <?php echo "Thank you for logging in " . $users['token']; ?>
            </div>

        <?php
        } catch (Exception $e) { ?>
            <div class="alert alert-danger m-1" role="alert">
                <?php echo "Please try again"; ?>
            </div>
    <?php
        }
    }
    ?>
</body>
</html>