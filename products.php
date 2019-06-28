<?php

//Import connection settings to DB
require_once 'config.php';

//Get all info from 'products' table
$sql = "SELECT * FROM products";
$products = mysqli_query($connect, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <title>CRUD PHP</title>
</head>

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <a href="add_product.php" class="btn btn-primary mb-3">Add New Product</a>

        <!-- Check if there are products in the DB -->
        <?php if (mysqli_num_rows($products) > 0) : ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              
              <!-- Output products one by one -->
              <?php foreach ($products as $key => $product) : ?>
                <tr>
                  <td><?= ++$key ?></td>
                  <td><?= $product['pname'] ?></td>
                  <td><?= $product['description'] ?></td>
                  <td>$<?= $product['price'] ?></td>
                  <td class="text-center">
                    <a href="product.php?id=<?= $product['id'] ?>" class="btn btn-info m-2" routerLink="/product/{{product.id}}">View</a>
                    <a href="edit_product.php?id=<?= $product['id'] ?>" class="btn btn-warning m-2">Edit</a>
                    <a href="delete_product.php?id=<?= $product['id'] ?>" class="btn btn-danger m-2 delete">Delete</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        <?php endif ?>
      </div>
    </div>
  </div>
</body>

</html>