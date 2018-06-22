<?php session_start (); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <link href="css/style.css"rel="stylesheet" type="text/css">
</head>
<body>
  <div id="wrapper">
    <h2>Support Breast Cancer</h2>
    <h3>Welcome to Breast Cancer Support Forum</h3>

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
  <div id="home">
    <p>Breast cancer in Kenya is the third most common cause of death after infectious and cardiovascular diseases. It contributes to 23.3% of cancer deaths. There are many factors that increase the chances of developing breast cancer. Although we know some of the risk factors, the main cause of breast cancer like any other cancer is not known. In Africa breast cancer kills more women over age 40 than HIV&AIDS and malaria combined. Five-year survival rates for breast cancer are much lower/worse in low and middle income countries.</p>

    <p>Our main aim is ro provide support for our users; breast cancer patients, survivors, doctors and other parties who have been affected by breast cancer one way or the other. Any other person(s) interested in supporting our users can feel free to join us</p>
    <br>
    <p>Disclaimer: Statements or sentiments that are aimed at demeaning or demoralising our users will not be tolerated</p>

    <p>Click here to read our <a href="#">Terms & Conditions</a> and our <a href="#">Privacy Policy</a>.</p>
    <br>
    <h2>Types of breast cancer.</h2>
    <p>Breast cancer can begin in different areas of the breast — the ducts, the lobules, or in some cases, the tissue in between. In this section, you can learn about the different types of breast cancer, including non-invasive, invasive, and metastatic breast cancers, as well as the intrinsic or molecular subtypes of breast cancer. You can also read about breast cancer in men. </p>
    <div class="types">
      <a href="dcis.html">Ductal Carcinoma In Situ (DCIS)</a>
      <a href="idc.html">Invasive Ductal Carcinoma (IDC)</a>
      <a href="tcb.html">IDC Type: Tubular Carcinoma of the Breast</a>
      <a href="mcb.html">IDC Type: Medullary Carcinoma of the Breast</a>
      <a href="mucb.html">IDC Type: Mucinous Carcinoma of the Breast</a>
      <a href="pcb.html">IDC Type: Papillary Carcinoma of the Breast</a>
      <a href="ccb.html">IDC Type: Cribriform Carcinoma of the Breast</a>
      <a href="ilc.html">Invasive Lobular Carcinoma (ILC)</a>
      <a href="ibc.html">Inflammatory Breast Cancer</a>
      <a href="lcis.html">Lobular Carcinoma In Situ (LCIS)</a>
      <a href="mbc.html">Male Breast Cancer</a>
      <a href="mosbc.html">Molecular Subtypes of Breast Cancer</a>
      <a href="pdn.html">Paget's Disease of the Nipple</a>
      <a href="ptb.html">Phyllodes Tumors of the Breast</a>
      <a href="mebc.html">Metastatic Breast Cancer</a>
    </div>
  </div>
<br>
<hr />
<br>
<div id="content">
  <h3>Below is a list of some categories we have where our members are able to discuss issues relatinf to breast cancer, especially in Kenya</h3>
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
