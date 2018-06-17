
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
    $tid = $_GET['tid'];
    $sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
    $res = mysqli_query($con, $sql) or die(mysqli_error() );
    if (mysqli_num_rows($res) == 1) {
      echo "<table width='100%'>";
      if ($_SESSION['uid']) {
        echo "<tr><td collapse='2'><input type='submit' value='Add Reply' onClick=\"window.location = 'post_reply.php?cid=".$cid."&tid=".$tid."'\" /><hr />"; } else {echo "<tr><td colspan='2'><p>Please Log In to add your reply</p><hr /></td></tr>";}
        while ($row = mysqli_fetch_assoc($res)) {
          $sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
          $res2 = mysqli_query($con, $sql2) or die (mysqli_error() );
          while ($row2 = mysqli_fetch_assoc($res2)) {
            echo "<tr><td valign='top'style='border: 1px solid #000000;'><div style='min-height: 125px;'>".$row['topic_title']."<br />by".$row2['post_creator']." - ".$row2['post_date']."<hr />".$row2['post_content']."</div></td><td width='200' valign='top'align='center' style='border: 1px solid #000000'>User Info Here</td></tr><tr><td colspan='2'><hr /><td></tr>";
          }
          $old_views = $row['topic_views'];
          $new_views = $old_views + 1;
          $sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
          $res3 = mysqli_query($con, $sql3) or die(mysqli_error() );
          
        }
      }   else {
        echo "<p>This Topic does not exist.</p>";
      }
      ?>
    </div>

  </body>
  </html>
