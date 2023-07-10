<?php
require "open_connection.php";
$email = (string) $_POST['exampleInputEmail1'];
$passw = password_hash(strval($_POST['exampleInputPassword1']), PASSWORD_DEFAULT);
if (isset($_POST['sbm_btn'])) {
    $qr = "INSERT INTO users (Email, Password) VALUES ('$email', '$passw')";
    $set = mysqli_query($con, $qr);
    header('Location: http://localhost:63342/SimpleWebsite/frontend/src/pages/login.html');
}

