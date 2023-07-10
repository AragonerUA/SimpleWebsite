<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shop_database";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "Failed!";
    exit();
}