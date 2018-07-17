
<?php

include_once("connect.php");

if(isset($_POST['username'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
  $res = mysqli_query($con, $sql) or die(mysqli_error($con));
  if (mysqli_num_rows($res) == 1){
    $row = mysqli_fetch_assoc($res);
    $_SESSION['uid'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    header("Location: user.php?uid=$_SESSION[uid]");
    exit();
  }
  else{
    echo "Invalid Login credentials, Please return to log in page and try again &bull; <a href='login.php'>LogIn</a>";
    exit();
  }
}

// if($){
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//   $sql = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."' LIMIT 1";
//   $res = mysqli_query($con, $sql) or die(mysqli_error($con));
//   if (mysqli_num_rows($res) == 1){
//     $row = mysqli_fetch_assoc($res);
//     $_SESSION['uid'] = $row['id'];
//     $_SESSION['username'] = $row['username'];
//     header("Location: admin.php?uid=$_SESSION[uid]");
//     exit();
//   }
//   else{
//     echo "Invalid Login credentials, Please return to log in page and try again &bull; <a href='login.php'>LogIn</a>";
//     exit();
//   }
// }

 ?>

<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags always come first -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="mdb.min.css" rel="stylesheet">

    <style>

        .intro-2 {
            background: url("img/login.jpg")no-repeat center center;
            background-size: cover;
        }
        .top-nav-collapse {
            background-color: #3f51b5 !important;
        }
        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }
        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5 !important;
            }
        }

        .card {
            background-color: rgba(229, 228, 255, 0.2);
        }
        .md-form label {
            color: #ffffff;
        }
        h6 {
            line-height: 1.7;
        }

        html,
        body,
        header,
        .view {
          height: 100%;
        }

        @media (min-width: 560px) and (max-width: 740px) {
          html,
          body,
          header,
          .view {
            height: 650px;
          }
        }

        @media (min-width: 800px) and (max-width: 850px) {
          html,
          body,
          header,
          .view  {
            height: 650px;
          }
        }

        .card {
            margin-top: 30px;
            /*margin-bottom: -45px;*/

        }

        .md-form input[type=text]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #8EDEF8;
            box-shadow: 0 1px 0 0 #8EDEF8;
        }
        .md-form input[type=text]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label {
            color: #8EDEF8;
        }

        .md-form .form-control {
            color: #fff;
        }

        .navbar.navbar-dark form .md-form input:focus:not([readonly]) {
            border-color: #8EDEF8;
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5!important;
            }
        }

    </style>

<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>

<body>

    <!--Main Navigation-->
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html"><strong>Back to home</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <!--Intro Section-->
        <section class="view intro-2">
          <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

                        <!--Form with header-->
                        <div class="card wow fadeIn animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
                            <div class="card-body">

                                <!--Header-->
                                <div class="form-header purple-gradient">
                                    <h3> Log in:</h3>
                                </div>
                                <form action='login.php' method='post'>
                                <!--Body-->
                                <div class="md-form">
                                    <input type="text" id="orangeForm-name" class="form-control" name='username'>
                                    <label for="orangeForm-name">Your username</label>
                                </div>

                                <div class="md-form">
                                    <input type="password" id="orangeForm-pass" class="form-control" name='password'>
                                    <label for="orangeForm-pass">Your password</label>
                                </div>

                                <div class="text-center">
                                    <input type="submit" class="btn purple-gradient btn-lg waves-effect waves-light" value="Login"/>
                                    <hr>
                                    <div class="inline-ul text-center d-flex justify-content-center">
                                    </div>
                                </div>
                              </form>
                            </div>
                        </div>
                        <br>
                        <!-- Copyright-->
                        <div class="footer-copyright py-3 text-center wow fadeIn" data-wow-delay="0.3s" style="visibility: hidden; animation-name: none; animation-delay: 0.3s;">
                            <div class="container-fluid">
                                © 2018 Copyright: <a href="#" target="_blank"> bcsupport.com </a>
                            </div>
                        <!--/Form with header-->

                    </div>
                </div>
            </div>
          </div>
        </section>

    </header>
    <!--Main Navigation-->


    <!--  SCRIPTS  -->
    <!-- JQuery -->
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="mdb.min.js"></script>
    <script>
        new WOW().init();
    </script>


<div class="hiddendiv common"></div></body></html>
