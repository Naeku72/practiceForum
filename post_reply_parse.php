<<?php
session_start();
if ($_SESSION['uid']){
  if (isset($_POST['reply_submit'])){
    include_once("connect.php");
    $creator = $_SESSION['uid'];
    $cid = $_POST['cid'];
    $tid = $_POST['tid'];
    $reply_content = $_POST['reply_content'];
    $sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
    $res = mysqli_query($con, $sql) or die(mysqli_error($con));
    $sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
    $res2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
    $sql3 = "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
    $res3 = mysqli_query($con, $sql3) or die(mysqli_error($con));

    //Email Sending
    $sql4 = "SLECT post_creator FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."' GROUP BY post_creator";
    $res4 = mysqli_query($con, $sql3) or die(mysqli_error($con));
    while ($row4 = mysqli_fetch_assoc($res4)){
      $userids[] .= $row4['post_creator'];
    }
    foreach ($useerids as $key) {
      $sql5 = "SELECT id, email FROM users WHERE id='".$key."' AND forum_notification='1' LIMIT 1";
      $res5 = mysqli_query($con, $sql5) or die(mysqli_error($con));
      if (mysqli_num_rows($res5)> 0) {
          $row5 = mysqli_fetch_assoc($res5);
          if ($row5['id'] != $creator){
            $email .= $row5['email'].", ";
          }
      }
    }
    $email = substr($email, 0, (strlen(email) -2));
    $to = "naekujoy@gmail.com";
    $from = "naekujoy@gmail.com";
    $bcc = $email;
    $subject = "Forum Reply";

    //This message can only contain text. No HTML tags! The HTML tags will just be printed into the email.
    $message = "Someon has replied to a topic you are a part of";

    $headers = "From: $from\r\nReply-To: $from";
    $headers .= "\r\nBcc: {$bcc}";
    mail($to, $subject, $message, $headers);
    //End of EMAIL sending



    if(($res) && ($res2) && ($res3)) {
      echo "<p>Your reply has been successfully posted. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Click here to return to the topic</a></p>";
    } else {
      echo "<p>There was a problem posting your reply, Plase try again</p>";
    }
  } else {
    exit();
  }
} else {
  exit();
}

 ?>>
