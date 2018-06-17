<?php session_start (); ?>
<?php
if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")){
  header("Location: index.php");
  exit();
}
$cid = $_GET['cid'];
include_once("connect.php");
include_once("create_topic_parse.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Post Reply</title>
  <link href="css/style.css"rel="stylesheet" type="text/css">
</head>
<body>
  <div id="wrapper">
    <h2>Log in to my forum | Breast Cancer Support forum</h2>
    <p>Creating Basic log in function</p>
    <?php
    echo "<p>You are logged in as " .$_SESSION['username']." &bull; <a href='logout_parse.php'>Logout</a>";
    ?>

    <br>
    <hr />
    <div id="content">

    </div>
  </div>


</body>
</html>
