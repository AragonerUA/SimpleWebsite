<?php
require "open_connection.php";

$price = $_POST['exampleInputPrice1'];
$name = $_POST['exampleInputName1'];
$description = $_POST['exampleInputDescription1'];

$number_of_pict = rand(1, 4);
$image = "/SimpleWebsite/frontend/src/images/pro1.png";
if ($number_of_pict == 2) {
    $image = "/SimpleWebsite/frontend/src/images/pro2.png";
}
else if ($number_of_pict == 3) {
    $image = "/SimpleWebsite/frontend/src/images/pro3.png";
}
else if ($number_of_pict == 4) {
    $image = "/SimpleWebsite/frontend/src/images/pro4.png";
}

$price = mysqli_real_escape_string($con, $price);
$name = mysqli_real_escape_string($con, $name);
$description = mysqli_real_escape_string($con, $description);
$image = mysqli_real_escape_string($con, $image);

$sql = "INSERT INTO `products` (price, image, name, description) VALUES ('$price', '$image', '$name', '$description')";
$result = mysqli_query($con, $sql);

$new_sql = "SELECT * FROM `products` WHERE price = '$price' AND image = '$image' AND name = '$name' AND description = '$description'";
$new_result = mysqli_query($con, $new_sql);
$row = mysqli_fetch_array($new_result, MYSQLI_ASSOC);

$product_id = $row["id"];

session_start();
$_SESSION["product_id"] = $product_id;
$_SESSION["product_price"] = $price;
$_SESSION["product_name"] = $name;
$_SESSION["product_description"] = $description;
$_SESSION["product_image"] = $image;

if (isset($_POST['sbm_btn'])) {
    header('Location: http://localhost:63342/SimpleWebsite/frontend/src/pages/UserProfile.php');
}
