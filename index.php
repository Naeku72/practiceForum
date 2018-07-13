
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Forum Page</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
      <button type="submit">Home</button>
    </form>
    <br>
<?php session_start (); ?>
    <?php
    if (!isset($_SESSION['uid'])){
      echo "<form action='login.php' method='post'>
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
  <h3>Below is a list of some categories we have where our members are able to discuss issues related to breast cancer</h3>
<?php
include_once("connect.php");
$sql = "SELECT * FROM categories ORDER BY category_title ASC";
$res = mysqli_query($con, $sql) or die(mysqli_error());
$categories = "";
if (mysqli_num_rows($res) > 0) {
	while ($row = mysqli_fetch_assoc($res)){
		$id = $row['id'];
		$title = $row['category_title'];
		$description = $row['category_description'];
		$categories .= "<a href='view_category.php?cid=".$id."'  class='cat_links'>".$title." - <font size='-1'>".$description."</font></a>";
	}
	echo $categories;
} else {
	echo "<p>There are no categories available yet</p>";
}

?>
</div>

</body>
</html>
