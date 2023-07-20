<?php
require "open_connection.php";
session_start();
$id_w = $_GET["id_write"];
//$prod_id = $_SESSION["product_id"];
$user_id = $_SESSION["ID"];
$sql = "DELETE FROM `basket` WHERE id_w='$id_w' AND id_user='$user_id'";
$result = mysqli_query($con, $sql);
header("Location: http://localhost:63342/SimpleWebsite/frontend/src/pages/basket.php");
