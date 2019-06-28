<?php

//Import connection settings to DB
require_once 'config.php';

//Get product id from GET request
$product_id = $_GET['id'] ?? 0;

//Get product info from DB
$sql = "SELECT * FROM products WHERE id = $product_id";
$product = mysqli_fetch_assoc(mysqli_query($connect, $sql));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>CRUD PHP</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Product <?= $product['pname'] ?></h2>
                <form class="form form-bordered" novalidate="novalidate" autocomplete="off">
                    <div class="form-group">
                        <label for="pname">Product Name</label>
                        <input type="text" disabled="disabled" name="pname" id="pname" class="form-control" value="<?= $product['pname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea disabled="disabled" name="description" id="description" cols="30" rows="5" class="form-control"><?= $product['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" disabled="disabled" name="price" id="price" class="form-control" value="<?= $product['price'] ?>">
                    </div>
                    <a href="products.php" class="btn btn-secondary float-right">Back</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>