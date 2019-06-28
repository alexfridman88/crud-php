<?php

//Import connection settings to DB
require_once 'config.php';

if(isset($_POST['submit'])){
    //Filter inputs by type
    $pname = filter_input(INPUT_POST, 'pname', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT);

    //Escapes special characters in a string (protection from SQL injection)
    $pname = mysqli_real_escape_string($connect, $pname);
    $description = mysqli_real_escape_string($connect, $description);
    $price = mysqli_real_escape_string($connect, $price);

    //Add new product to DB
    $sql = "INSERT INTO products VALUES(NULL,'$pname','$description','$price')";
    if(mysqli_query($connect, $sql)){
        header('location: products.php');
    }
}
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
                <h2>Add New Product</h2>
                <form method="POST" class="form form-bordered" novalidate="novalidate" autocomplete="off">
                    <div class="form-group">
                        <label for="pname">Product Name</label>
                        <input type="text" name="pname" id="pname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success float-right">Add Product</button>
                    <a href="products.php" class="btn btn-secondary float-left">Back</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>