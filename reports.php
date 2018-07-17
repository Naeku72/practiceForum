<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>REPORTS PAGE</title>
  </head>
  <body>
<?php

include_once('connect.php');


?>


<div class="users">
  <h2>Table displaying Users in the system currently</h2>
  <?php
$sql = "SELECT * FROM users ";
$sqldata = mysqli_query($con, $sql) or die("Error... Fetching Failed");
   ?>
   <table>
     <tr>
       <th>username</th>
       <th>fname</th>
       <th>lname</th>
       <th>email</th>
     </tr>
     <tbody>
       <?php
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  echo '<tr><td>';
  echo $row['username'];
  echo '</td><td>';
  echo $row['fname'];
  echo '</td><td>';
  echo $row['lname'];
  echo '</td><td>';
  echo $row['email'];
  echo '</td></tr>';
}
        ?>
     </tbody>
   </table>
</div>
<div class="cats">
  <h2>Table displaying Categories in the system currently</h2>
  <?php
$sql = "SELECT * FROM categories ";
$sqldata = mysqli_query($con, $sql) or die("Error... Fetching Failed");
   ?>
   <table>
     <tr>
       <th>Category Name</th>
       <th>Category Description</th>
     </tr>
     <tbody>
       <?php
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  echo '<tr><td>';
  echo $row['category_title'];
  echo '</td><td>';
  echo $row['category_description'];
  echo '</td></tr>';
}
        ?>
     </tbody>
   </table>
</div>
<div class="topics">
  <h2>Table displaying Topics in the system currently</h2>
  <?php
$sql = "SELECT * FROM topics ";
$sqldata = mysqli_query($con, $sql) or die("Error... Fetching Failed");
   ?>
   <table>
     <tr>
       <th>Topic Title</th>
       <th>Number of Views</th>
       <th>Topic Category</th>

     </tr>
     <tbody>
       <?php
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  echo '<tr><td>';
  echo $row['topic_title'];
  echo '</td><td>';
  echo $row['topic_views'];
  echo '</td><td>';
  echo $row['category_id'];
  echo '</td></tr>';
}
        ?>
     </tbody>
   </table>
</div>
  </body>
</html>
