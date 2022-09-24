<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
  'base_uri' => 'https://dummyjson.com/'
]);
$id = $_GET["product_id"];
$response = $client->get('products/' . $id);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Single Product</title>
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
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Thumbnail</th>
        </tr>
        <tb>
            <th><?= $product->id?></th>
            <td><?= $product->title?></td>
            <td><?= $product->description?></td>
            <td><?= $product->price?></td>
            <td><?= $product->brand?></td>
            <td><?= $product->category?></td>
            <td><?="<img width=150x; height=150x; src=" . $product->thumbnail .">";?></td>
        </tb>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>