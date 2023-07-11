<?php
require "open_connection.php";

$email = (string) $_POST['exampleInputEmail1'];
//$passw = password_hash(strval($_POST['exampleInputPassword1']), PASSWORD_DEFAULT);
$passw = (string) $_POST['exampleInputPassword1'];

//to prevent from mysqli injection
$user_name = stripcslashes($email);
$pass_word = stripcslashes($passw);
$user_name = mysqli_real_escape_string($con, $user_name);
$pass_word = mysqli_real_escape_string($con, $pass_word);

$sql = "select * from users where Email = '$user_name' and Password = '$pass_word'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if($count == 1){
//    echo "<h1><div style=\"text-align: center;\"> Login successful </div></h1>";
    header("location: http://localhost:63342/SimpleWebsite/frontend/src/index.html?_ijt=rmlbgu6sdsrtld8v8hhmp7d5tj&_ij_reload=RELOAD_ON_SAVE#login");
}
else{
    echo "<h1> Login failed. Invalid username or password.</h1>";
//    header("http://localhost:63342/SimpleWebsite/frontend/src/pages/login.html");
}
