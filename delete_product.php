<?php

//Import connection settings to DB
require_once 'config.php';

//Get product id from GET request
$product_id = $_GET['id'] ?? 0;

//Get product name from DB
$sql = "SELECT pname FROM products WHERE id = $product_id";
$product = mysqli_fetch_assoc(mysqli_query($connect, $sql));


if (isset($_POST['submit'])) {
    //Delete product
    $sql = "DELETE FROM products WHERE id = $product_id";
    if(mysqli_query($connect, $sql)){
        header('location:products.php');
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
                <h2>Are you sure to delete <?= $product['pname'] ?>?</h2>
                <form action="" method="POST">
                    <button type="submit" name="submit" class="btn btn-danger float-right mt-3">DELETE</button>
                    <a href="products.php" class="btn btn-secondary mt-3">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>