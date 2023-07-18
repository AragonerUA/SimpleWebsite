<?php
require "open_connection.php";
session_start();

$sql = "SELECT * FROM `products`";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result, MYSQLI_ASSOC);

///////