<?php
require "open_connection.php";
session_start();
$id = $_SESSION["ID"];

$sql = "DELETE FROM `basket` 
WHERE `id_user` = $id";
$result = mysqli_query($con, $sql);
