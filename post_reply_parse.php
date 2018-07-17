<?php
require("connect.php");

    $creator = $_SESSION['username'];
    $cid = $_POST['cid'];
    $tid = $_POST['tid'];
    $reply_content = $_POST['reply_content'];
    $sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
    $sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
    $res2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
    $sql3 = "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
    $res3 = mysqli_query($con, $sql3) or die(mysqli_error($con));

    if(($res) && ($res2) && ($res3)) {
      echo "
      <br>
      <div class='row'>
        <div class='card col-md-11'><br>
        $reply_content <br>
        <br>
        Your reply has been successfully posted. <br >
      </div>
      </div>";
      ?>
      <?php
    } else {
      echo "<p>There was a problem posting your reply, Plase try again</p>";
    }


 ?>
