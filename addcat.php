<?php

include_once ('connect.php');

$catname = $_POST['catname'];
$catdesc = $_POST['catdesc'];

$sql = "INSERT INTO categories (category_title, category_description) VALUES('".$catname."', '".$catdesc."')";

if($con -> query($sql)===TRUE){
  echo "success . <a href='admin.php'>Back</a>";
}
else{
  echo "nope";
}

 ?>
