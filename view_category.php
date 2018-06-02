<?php session_start (); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>View Category</title>
  <link href="css/style.css"rel="stylesheet" type="text/css">
</head>
<body>
  <div id="wrapper">
    <h2>Log in to my forum | Breast Cancer Support forum</h2>
    <p>Creating Basic log in function</p>
    <?php
    if (!isset($_SESSION['uid'])){
      echo "<form action='login_parse.php' method='post'>
      Username: <input type='text' name='username' />&nbsp;
      Password: <input type='password' name='password' />&nbsp;
      <input type='submit' name='submit' value='Log In' />";
    }
    else {
      echo "<p>You are logged in as ".$_SESSION['username']." &bull; <a href='logout_parse.php'>Logout</a>";
    }
    ?>
  </div>
<br>
<hr />
<br>
<div id="content">
<?php
include_once("connect.php");
$cid = $_GET['cid'];
if (isset($_SESSION['uid'])){
  $logged = "| <a href='create_topic.php?cid=".$cid."'>Click Here To Create a Topic</a>";
} else{
  $logged = "| <a href='index.php?cid=".$cid."'>Please log in to create topics in this forum.";
}
$sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
$res = mysqli_query($con, $sql) or die(mysqli_error());
if (mysqli_num_rows($res) == 1){
  $sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
  $res2 = mysqli_query($con, $sql2) or die(mysqli_error());

  if (mysqli_num_rows($res2) > 0) {
    $topics .= "<table width='100%' style='border-collapse: collapse;'>";
    $topics .= "<tr><td colspan='3'><a href='index.php'>Return To Forum Index</a>".$logged."<hr /></td></tr>";
    $topics .= "<tr style='background-coloc: #dddddd;'><td>Topic Title</td><td width='65' align='center'>Replies</td><td width='65' align='center'>Views></td></tr>";
    $topics .= "<tr><td colspan='3'><hr /></td></tr>";

    while ($row = mysqli_fetch_assoc($res2)){
      $tid = $row['id'];
      $title = $row['topic_title'];
      $views = $row['topic_views'];
      $date = $row['topic_date'];
      $creator = $row['topic_creator'];
      $topics .= "<tr><td><a href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br /><span class='post_info'>Posted by:".$creator." on ".$date."</span></td><td align='center'>".$views."</td></tr>";
      $topics .= "<tr><td colspan='3'><hr /></td></tr>";
    }
    $topics .= "</table>";
    echo $topics;
  }
  else {
    echo "<a href='index.php'> Return to Forum Home Page</a><hr />";
    echo "<p>There are no topics in this category yet.".$logged."</p>";
  }
}else{
  echo "<a href='index.php'> Return to Forum Home Page</a><hr />";
  echo "<p>You are trying to view a category that does not exist yet";
}
 ?>
</div>

</body>
</html>
