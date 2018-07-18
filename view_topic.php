<?php require("head.php") ?>

        <!--Panel 1-->
        <div class="tab-pane fade active show" id="panel83" role="tabpanel">

          <div id="content">
            <?php
            include_once("connect.php");
            $cid = $_GET['cid'];
            $tid = $_GET['tid'];
            $sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
            $res = mysqli_query($con, $sql) or die(mysqli_error() );
            if (mysqli_num_rows($res) == 1) {
              echo "<table width='100%'>";
              if ($_SESSION['uid']) {
                echo "<tr><td collapse='2'>
                <input type='submit' value='Add Reply' class='btn btn-primary' onClick=\"window.location = 'post_reply.php?cid=".$cid."&tid=".$tid."'\" />
                <hr />"; } else {echo "<tr><td colspan='2'><p>Please Log In to add your reply</p><hr /></td></tr>";}
                while ($row = mysqli_fetch_assoc($res)) {
                  $sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
                  $res2 = mysqli_query($con, $sql2) or die (mysqli_error() );
                  while ($row2 = mysqli_fetch_assoc($res2)) {
                    echo "
                    <tr>
                    <td valign='top'style='border: 1px solid #8EDEF8;'>
                    <div style='min-height: 125px;'>".$row['topic_title']."<br />by ".$row2['post_creator']." - ".$row2['post_date']."<hr />".$row2['post_content']."
                    </div>
                    </td>

                    </tr>
                    <tr>
                    <td colspan='2'><hr /><td>
                    </tr>";
                  }
                  $old_views = $row['topic_views'];
                  $new_views = $old_views + 1;
                  $sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
                  $res3 = mysqli_query($con, $sql3) or die(mysqli_error() );

                }
              }   else {
                echo "<p>This Topic does not exist.</p>";
              }
              echo "</table>";
              ?>
		<button type="button" class="btn btn-primary" onclick="history.back();">Back</button>
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
                          <div class="avatar z-depth-1-half mb-4">
                            <img src="img/dp1.jpg" class="rounded-circle" alt="First sample avatar image">
                          </div>


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
                                  <h3 class="mb-3 font-weight-bold" style="color: Blue;"><strong><?php echo $fname; echo " ".$lname; ?></strong></h3>

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
