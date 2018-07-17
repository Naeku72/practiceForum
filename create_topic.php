<?php
  session_start();
  require("connect.php");
  require("head.php")
  ?>

        <!--Panel 1-->
        <div class="tab-pane fade active show" id="panel83" role="tabpanel">

          <div id="content">



            <?php
            if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")){
              header("Location: login.php");
              exit();
            }
            $cid = $_GET['cid'];
            include_once("connect.php");
            include_once("create_topic_parse.php");


            ?>

            <body>
              <div id="wrapper">
                <?php
                echo "<p>You are logged in as " .$_SESSION['username']." ";
                ?>
                <br>

                <div id="content">
                  <form action="create_topic_parse.php" method="post">
                    <p>Topic Title</p>
                    <input type="text" name="topic_title" size="70" maxlength="70" />
                    <p>Topic Content</p>
                    <textarea name="topic_content" rows="5" cols="75"></textarea>
                    <br>
                    <br>
                    <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
                    <input type="submit" class="btn btn-primary" name="topic_submit" value="Create Your Topic" />
                  </form>

                </div>
              </div>


            </body>
            </html>

          </div>
	<button type="button" class="btn btn-primary" onclick="history.back();">Back</button>
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
				<div class="avatar z-depth-1-half mb-4">
                                <img src="img/person.jpg" class="rounded-circle" alt="First sample avatar image">
                            </div>

                            <div class="card-body pt-0 mt-0">
                              <div class="avatar z-depth-1-half mb-4">
                                <img src="img/person.jpg" class="rounded-circle" alt="First sample avatar image">
                              </div>
                                <!--Name-->
                                <div class="text-center">
                                  <?php

                                  if( isset($_SESSION['uid']) )
                                  {
                                    $sel = mysqli_query($con, "SELECT * FROM users WHERE id = $_SESSION[uid]
                                    LIMIT 1 ");
                                    while($a = mysqli_fetch_array($sel))
                                    {
                                      $uname = $a['username'];
                                      $uemail = $a['email'];
                                      $uphone = $a['phone'];
                                      $fname = $a['fname'];
                                      $lname = $a['lname'];
                                    }
                                  }
                                  ?>
                                    <h3 class="mb-3 font-weight-bold" style="color: Blue;"><strong><?php echo $fname; echo " ".$lname; ?></strong></h3>

                                </div>

                                <ul class="striped list-unstyled">
                                    <li><strong>Username:</strong><?php echo $uname;   ?></li>

                                    <li><strong>E-mail address:</strong><?php echo $uemail;   ?> </li>

                                    <li><strong>Phone number:</strong> <?php echo $uphone;   ?></li>



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
