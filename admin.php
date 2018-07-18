<?php // require("head.php") ?>

<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="mdb.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Your custom styles (optional) -->
    <style>

    </style>
<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>

<body class="fixed-sn purple-gradient">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg double-nav" >
            <!-- SideNav slide-out button -->
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <a href='index.html' class='btn btn-primary'>Home</a>
            </div>

            <!--Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

              <li class="nav-item">
                  <a class="nav-link waves-effect" href='catreport.php'> <span class="clearfix d-none d-sm-inline-block">Categories</span></a>
              </li>

              <li class="nav-item">
                  <a class="nav-link waves-effect" href="adminlogin.php"> <span class="clearfix d-none d-sm-inline-block">Logout</span></a>
              </li>

            </ul>
            <!--/Navbar links-->
        </nav>
        <!-- /.Navbar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main>
        <div class="container-fluid">

            <!--Section: Customers-->

            <section class="section team-section">

                <!-- First row -->
                <div class="row">
                    <!-- First column -->
                    <div class="col-md-8">
                        <div class="row">

                            <div class="col-md-12 mb-1">
                                <!-- Tabs -->
                                <!-- Nav tabs -->
                                <!-- Tab panels --><br><br><br><br>
                                <div class="tab-content card">







        <!--Panel 1-->
        <div class="tab-pane fade active show" id="panel83" role="tabpanel">

          <p>It is the responsibility of the admin for this forum to perform the tasts below if and only if the users request for any of these actions to be performed. As for deleting a user account, the complaints from the users who want it deleted should be verified before deleting the users account. The Administrator is by no means under any circumstance to give a user his/her password for this account as that will  violate the <a href="#" style="color: Green;">Terms and Conditions</a> for this forum as well as the <a href="#" style="color: Green;">Privacy Policy</a>
            <br><br><br>
            <p>
              <h3>Add a Category</h3>
              <div class="row">
                <form name='catform' method="post" action="addcat.php" style="padding-left: 40px;">
                  <div class="md-form mb-0">
                  <input type="text" id="addcatname" class="form-control" name='catname'>
                  <label for="form-contact-email" class="" >Category Name</label>
                </div>
                <div class="md-form mb-0">
                  <input type="text" id="addcatdesc" class="form-control" name='catdesc'>
                  <label for="form-contact-email" class="" >Category Description</label>
                </div>
              <input class="btn btn-primary" type='submit' value = 'Add Category'>
            </form>
            </div>
            </p>
            <br><br>
            <p>
              <h3>Remove a User</h3>
              <div class="row">
                <form name='catform' method="post" action="addcat.php" style="padding-left: 40px;">
                  <div class="md-form mb-0">
                  <input type="text" id="addcatname" class="form-control" name='username'>
                  <label for="form-contact-email" class="" >User Name</label>
                </div>
                <div class="md-form mb-0">
                  <input type="text" id="addcatdesc" class="form-control" name='fname'>
                  <label for="form-contact-email" class="" >First Name</label>
                </div>
                <div class="md-form mb-0">
                  <input type="text" id="addcatdesc" class="form-control" name='lname'>
                  <label for="form-contact-email" class="" >Last Name</label>
                </div>
              <input class="btn btn-primary" type='submit' value = 'Delete User Account'>
            </form>
            </div>
            </p>
            <br><br>
            <p>
              <h3>Click the button Below to View Reports</h3>
              <a class="btn btn-primary" href="reports.php">Generate Reports</a>
            </p>


          </p>
        </div>
                                    <!--/.Panel 1-->
                                </div>
                                <!-- /.Tabs -->
                            </div>
                        </div>

                    </div>
                    <!-- /.First column -->
                    <!-- Second column -->
                    <div class="col-md-4 mb-1">

                        <!--Card-->
                        <div class="card profile-card">


                            <div class="card-body pt-0 mt-0">
                                <!--Name-->
                                <div class="text-center">
                                    <h3 class="mb-3 font-weight-bold"><strong>Administrator</strong></h3>
                                    <h6 class="font-weight-bold blue-text mb-4">Administrator</h6>
                                </div>

                                <ul class="striped list-unstyled">
                                    <li><strong>E-mail address:</strong> naekujoy@gmail.com</li>

                                    <li><strong>Phone number:</strong> 0718 592 124</li>

                                    <li><strong>Phone number:</strong> 0775 645 309</li>

                                    <li><strong>Company:</strong> Breast Cancer Support Forum</li>

                                </ul>

                            </div>

                        </div>

                        <!--Card-->

                    </div>
                </div>
                <!-- /.Second column -->

        </section></div>
        <!-- /.First row -->

<?php require("foot.php") ?>
