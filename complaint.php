<?php
include_once('connect.php');

$complaint = $_POST['complaint'];
$uid = $_SESSION['uid'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

$sql = "INSERT INTO complaints (user_id, username, complaint, user_email ) VALUES ('".$uid."', '".$username."', '".$complaint."', '".$email."')";
if ($con ->query($sql) == TRUE) {
  echo "Complaint Successfully Sent";
  echo "You will be redirected in 2 seconds";
?>
<meta http-equiv="refresh" content="2; URL='user.php'"/>
<?php
}
else {
  echo "Error:" .$sql. "<br>" .$con->error;
}
$con ->close();
 ?>


