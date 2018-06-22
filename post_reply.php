<?php session_start (); ?>
<?php
if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")){
  header("Location: index.php");
  exit();
}
$cid = $_GET['cid'];
$tid = $_GET['tid'];
include_once("connect.php");


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
      <form action="post_reply_parse.php" method="post">
        <p>Post Reply</p>
        <textarea name="reply_content" rows="5" cols="75"></textarea>
        <br>
        <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
        <input type="hidden" name="tid" value="<?php echo $tid; ?>" />
        <input type="submit" name="reply_submit" value="Post Your Reply" />

      </form>
    </div>
  </div>


</body>
</html>
