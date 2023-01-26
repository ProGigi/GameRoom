<?php
session_start();
require('script.php');
$_SESSION["login"]=0;

$name = $_POST['username'];
$password = $_POST['pass1'];
$pass_hash = md5($password);

$task ="SELECT * FROM `Users` WHERE UserNick = '$name' && UserPass = '$pass_hash'";
echo $task;
$query = mysqli_query($connect, $task);
$fetchUser = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query)==1){
    $_SESSION["login"]=2;
    $_SESSION["UserId"] = $fetchUser['UserId'];
    header("Location:index.php");
}
else
header("Location:register1.php?errorLogin");