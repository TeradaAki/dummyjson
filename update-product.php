<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$products = [
  'json' => [
  'title' => 'G633S',
  'description' => '50 mm PRO-G audio drivers and DTS Headphone:X 2.01 create expansive, detailed and immersive soundscapes. Fully customizable with G HUB—from LIGHTSYNC RGB lighting to G-keys to audio preferences. 1 DTS Headphone:X 2.0 surround sound and EQ presets are only available for Windows® OS and requires Logitech G HUB gaming software.',
  'price' => '6749',
  'brand' => 'Logitech',
  'category' => 'Gaming Headset',
  'thumbnail' => 'Logi.png'
  ]
];

$response = $client->put('https://dummyjson.com/products/1', $products);
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
  <title>Update Product</title>
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
            <th><?= $product->id ?></th>
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