
<?php

if (isset($_POST['topic_submit'])){
  if(($_POST['topic_title'] == "") && ($_POST['topic_content'] == "")) {
    echo "You did not fill in both fields. Please return to previous page";
    exit();
  } else{
    include_once("connect.php");
    $cid = $_POST['cid'];
    $title = $_POST['topic_title'];
    $content = $_POST['topic_content'];
    $creator = $_SESSION['username'];
    $sql = "INSERT INTO topics(category_id, topic_title, topic_creator, topic_date, topic_reply_date) VALUES ('".$cid."', '".$title."', '".$creator."', now(), now() )";
    $res = mysqli_query($con, $sql) or die(mysqli_error());
    $new_topic_id = mysqli_insert_id($con);
    $sql2 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$new_topic_id."', '".$creator."', '".$content."', now() )";
    $res2 = mysqli_query($con, $sql2) or die(mysqli_error());
    $sql3 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
    $res3 = mysqli_query($con, $sql3) or die(mysqli_error());
    if (($res) && ($res2) && ($res3)) {
      header("Location: view_topic.php?cid=".$cid."&tid=".$new_topic_id."");
    } else {
      echo "There was a problem creating your topic. PLease try again";
    }
  }
}
 ?>
