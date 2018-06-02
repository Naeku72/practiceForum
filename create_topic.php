<?php session_start (); ?>
<?php
if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")){
  header("Location: index.php");
  exit();
}
$cid = $_GET['cid'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>create topic</title>
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
      <form action="create_topic_parse.php" method="post">
        <p>Topic Title</p>
        <input type="text" name="topic_title" size="98" maxlength="200" />
        <p>Topic Content</p>
        <textarea name="topic_content" rows="5" cols="75"></textarea>
        <br>
        <br>
        <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
        <input type="submit" name="topic_submit" value="Create Your Topic" />
      </form>

    </div>
  </div>


</body>
</html>
