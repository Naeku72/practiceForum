<?php require("head.php") ?>

        <!--Panel 1-->
        <div class="tab-pane fade active show" id="panel83" role="tabpanel">

          <div id="content">
          <?php
          include_once("connect.php");
          $cid = $_GET['cid'];
          if (isset($_SESSION['uid'])){
            $logged = "| <a href='create_topic.php?cid=".$cid."'>Click Here To Create a Topic</a>";
          } else{
            $logged = "| <a href='login.php?cid=".$cid."'>Please log in to create topics in this forum.";
          }
          $sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
          $res = mysqli_query($con, $sql) or die(mysqli_error() );
          if (mysqli_num_rows($res) == 1){
            $sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
            $res2 = mysqli_query($con, $sql2) or die(mysqli_error() );

            if (mysqli_num_rows($res2) > 0) {
              $topics .= "<table width='100%' style='border-collapse: collapse;'>";
              $topics .= "<tr>
              <td colspan='3'><a href='Forum.html'>Return To Home Page</a>".$logged."<hr />
              </td>
              </tr>";
              $topics .= "<tr style='background-color: #dddddd;'>
              <td>Topic Title</td>
              <td width='65' align='center'>Views</td>
              </tr>";
              $topics .= "<tr>
              <td colspan='3'><hr /></td>
              </tr>";

              while ($row = mysqli_fetch_assoc($res2)){
                $tid = $row['id'];
                $title = $row['topic_title'];
                $views = $row['topic_views'];
                $date = $row['topic_date'];
                $creator = $row['topic_creator'];
                $topics .= "<tr>
                <td><a href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br /><span class='post_info'>Posted by:".$creator." on ".$date."</span></td>
                <td align='center'>".$views."</td>
                </tr>";
                $topics .= "<tr>
                <td colspan='3'><hr /></td>
                </tr>";
              }
              $topics .= "</table>";
              echo $topics;
            }
            else {
              echo "<a href='index.php'> Return to Forum Home Page</a><hr />";
              echo "<p>There are no topics in this category yet.".$logged."</p>";
            }
          }else{
            echo "<a href='index.php'> Return to Forum Home Page</a><hr />";
            echo "<p>You are trying to view a category that does not exist yet";
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
