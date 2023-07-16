<?php
//require "open_connection.php";
//
//$email = (string) $_POST['exampleInputEmail1'];
////$passw = password_hash(strval($_POST['exampleInputPassword1']), PASSWORD_DEFAULT);
//$passw = (string) $_POST['exampleInputPassword1'];
//
////to prevent from mysqli injection
//$user_name = stripcslashes($email);
//$pass_word = stripcslashes($passw);
//$user_name = mysqli_real_escape_string($con, $user_name);
//$pass_word = mysqli_real_escape_string($con, $pass_word);
//
//$sql = "select * from users where Email = '$user_name' and Password = '$pass_word'";
//$result = mysqli_query($con, $sql);
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//$count = mysqli_num_rows($result);
//
//if($count == 1){
////    echo "<h1><div style=\"text-align: center;\"> Login successful </div></h1>";
//    header("location: http://localhost:63342/SimpleWebsite/frontend/src/index.html?_ijt=rmlbgu6sdsrtld8v8hhmp7d5tj&_ij_reload=RELOAD_ON_SAVE#login");
//}
//else{
//    echo "<h1> Login failed. Invalid username or password.</h1>";
////    header("http://localhost:63342/SimpleWebsite/frontend/src/pages/login.html");

require "open_connection.php";

$email = $_POST['exampleInputEmail1'];
$is_admin = false;
if ($email == "les4sixstm@gmail.com" or $email == "san4es.kom@mail.ru") {
    $is_admin = true;
}
$passw = $_POST['exampleInputPassword1'];

// Validate and sanitize user inputs to prevent SQL injection
$user_name = mysqli_real_escape_string($con, $email);
$pass_word = mysqli_real_escape_string($con, $passw);
$sql = "SELECT * FROM users WHERE Email = '$user_name' AND Password = '$pass_word'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$id = $row["Id"];
$count = mysqli_num_rows($result);

if ($count == 1) {
    // Redirect to the profile page
    header("Location: /SimpleWebsite/frontend/src/pages/UserProfile.php");
} else {
    echo "<h1> Login failed. Invalid username or password.</h1>";
}
session_start();
$_SESSION["required_email"] = $email;
$_SESSION["is_admin"] = $is_admin;
$_SESSION["ID"] = $id;

