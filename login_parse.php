<?php

session_start();
include_once("connect.php");

if(isset($_POST['username'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
  $res = mysqli_query($con, $sql) or die(mysqli_error($con));
  if (mysqli_num_rows($res) == 1){
    $row = mysqli_fetch_assoc($res);
    $_SESSION['uid'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    header("Location: index.php");
    exit();
  }
  else{
    echo "Invalid Login credentials, Please return to log in page and try again &bull; <a href='index.php'>LogIn</a>";
    exit();
  } 
}

 ?>
