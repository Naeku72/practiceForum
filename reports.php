<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>REPORTS PAGE</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <!-- Custom css -->
    <link rel="stylesheet" href="css/reports.css" type="text/css">
  </head>
  <body>
<?php include_once('connect.php'); ?>

<h2>REPORT TABLES</h2>

<div class="row wow fadeIn" style="visibility: visible; animation-name: fadeIn; margin: 10px;">
  <h2 style="font-size: 1.5rem; color: Blue;">Table displaying Users in the system currently</h2>
  <?php
$sql = "SELECT * FROM users ";
$sqldata = mysqli_query($con, $sql) or die("Error... Fetching Failed");
   ?>
   <table  class="table table-hover">
     <tr  style="background-color: #008B8B;">
       <th class="blue-grey lighten-4">Username</th>
       <th class="blue-grey lighten-4">First Name</th>
       <th class="blue-grey lighten-4">Last Name</th>
       <th class="blue-grey lighten-4">Email</th>
     </tr>
     <tbody style="margin-left: 20px">
       <?php
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  echo '<tr style="background-color: #C0C0C0;"><td>';
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
<br><br>
<div class="row wow fadeIn" style="visibility: visible; animation-name: fadeIn; margin: 10px;">
  <h2 style="font-size: 1.5rem; color: Blue;">Table displaying Categories in the system currently</h2>
  <?php
$sql = "SELECT * FROM categories ";
$sqldata = mysqli_query($con, $sql) or die("Error... Fetching Failed");
   ?>
   <table class="table table-hover">
     <tr style="background-color: #008B8B;">
       <th class="blue-grey lighten-4">Category ID</th>
       <th class="blue-grey lighten-4">Category Name</th>
       <th class="blue-grey lighten-4">Category Description</th>
     </tr>
     <tbody>
       <?php
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  echo '<tr style="background-color: #C0C0C0;"><td>';
  echo $row['id'];
  echo '</td><td>';
  echo $row['category_title'];
  echo '</td><td>';
  echo $row['category_description'];
  echo '</td></tr>';
}
        ?>
     </tbody>
   </table>
</div>
<br><br>
<div class="row wow fadeIn" style="visibility: visible; animation-name: fadeIn; margin: 10px;">
  <h2 style="font-size: 1.5rem; color: Blue;">Table displaying Topics in the system currently</h2>
  <?php
$sql = "SELECT * FROM topics ";
$sqldata = mysqli_query($con, $sql) or die("Error... Fetching Failed");
   ?>
   <table class="table table-hover">
     <tr style="background-color: #008B8B;">
       <th class="blue-grey lighten-4" >Topic Title</th>
       <th class="blue-grey lighten-4">Number of Views</th>
       <th class="blue-grey lighten-4">Topic Category</th>

     </tr>
     <tbody>
       <?php
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  echo '<tr style="background-color: #C0C0C0;"><td>';
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

<button type="button" class="btn btn-primary" onclick="history.back();">Back to Admin Page</button>
<br><br><br><br>

  </body>
</html>
