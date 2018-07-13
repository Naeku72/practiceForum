<?php require("head.php") ?>

        <!--Panel 1-->
        <div class="tab-pane fade active show" id="panel83" role="tabpanel">

          <div id="content">
            <p style="color: black; font-size: 1rem;">Below is a list of some categories we have where our members are able to discuss issues related to breast cancer</p>
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
          		$categories .= "
              <div class='row'>
              <div class='card col-md-10'>
              <br>
                <a href='view_category.php?cid=".$id."'>".$title."
                </a><br>
                <p>$description</p>
              </div>
                            </div><br><br>";
          	}
          	echo $categories;
          } else {
          	echo "<p>There are no categories available yet</p>";
          }

          ?>
          </div>

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
                                    <h3 class="mb-3 font-weight-bold"><strong><?php echo $fname; echo " ".$lname; ?></strong></h3>

                                </div>

                                <ul class="striped list-unstyled">
                                    <li><strong>Username: </strong><?php echo $uname;   ?></li>

                                    <li><strong>E-mail address: </strong><?php echo $uemail;   ?> </li>

                                    <li><strong>Phone number: </strong> <?php echo $uphone;   ?></li>



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
