<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$users = [
    'json' => ['id' => '1',
    'firstName' => 'Aemon',
    'maidenName' => 'Valaryan',
    'lastName' => 'Targaryan',
    'age' => '40',
    'gender' => 'male',
    'email' => 'Aemon.Targaryan@gmail.com',
    'phone' => '092826774888',
    'bloodGroup' => 'A+',
    'image' => 'Aemon.webp'
      ]
  ];

$response = $client->delete('https://dummyjson.com/users/1');
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
        table, th, td {
        border: 1px solid black;
        border-color: #219ebc;
        }

        th {
            background: #023047;
            color: #ffb703;
            text-align: center;
        }

        td {
            background: #00203FFF;
            color: #ADEFD1FF;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Complete Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Blood Type</th>
            <th>Image</th>
        </tr>
        <tr>
            <th><?= $user->id?></th>
            <td><?= $user->firstName?><?= " "?><?= $user->maidenName?><?= " "?><?= $user->lastName?></td>
            <td><?= $user->age ?></td>
            <td><?= $user->gender?></td>
            <td><?= $user->email?></td>
            <td><?= $user->phone?></td>
            <td><?= $user->bloodGroup?></td>
            <td><img src="<?= $user->image?>" width="70" length="70"></td>
        </tr>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>