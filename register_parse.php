<?php

include_once('connect.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "INSERT INTO users (fname, lname, username, password, email, phone) VALUES ('".$fname."', '".$lname."', '".$uname."', '".$password."', '".$email."', '".$phone."')";
if ($con ->query($sql) == TRUE) {
  echo "Account Successfully Created";
  echo "You will be redirected in 3 seconds";
?>
<meta http-equiv="refresh" content="3; URL='login.php'"/>
<?php
}
else {
  echo "Error:" .$sql. "<br>" .$con->error;
}
$con ->close();
 ?>
