<?php
require "open_connection.php";
session_start();
$id = $_SESSION["ID"];

$sql = "SELECT * FROM `products` WHERE `id` = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$good_id = $row["id"];

if (isset($_POST['add_to_basket'])) {
    $qr = "INSERT INTO basket (id_prod, id_user) VALUES ('$good_id', '$id')";
    $set = mysqli_query($con, $qr);
    header('Location: http://localhost:63342/SimpleWebsite/frontend/src/pages/basket.php');
}
