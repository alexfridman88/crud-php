<?php

define('HOST','localhost');  // HOST
define('USER','root');       // USER NAME
define('PASSWORD','');       // PASSWORD
define('DB','crud');         // DATABASE NAME

//Connect to DB
$connect = mysqli_connect(HOST, USER, PASSWORD, DB);

//Set language package
mysqli_query($connect, 'SET NAMES utf8');