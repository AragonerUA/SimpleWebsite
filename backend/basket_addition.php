<?php
require "open_connection.php";
session_start();
$product_id = $_GET["product_id"];

$sql = "SELECT * FROM `products` WHERE `id` = '$product_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$good_id = $row["id"];
$user_id = $_SESSION["ID"];

$qr = "INSERT INTO `basket` (id_prod, id_user) VALUES ('$good_id', '$user_id')";
$set = mysqli_query($con, $qr);
header('Location: http://localhost:63342/SimpleWebsite/frontend/src/pages/basket.php');
