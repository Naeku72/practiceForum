<?php require("head.php") ?>

        <!--Panel 1-->
        <div class="tab-pane fade active show" id="panel83" role="tabpanel">

          <br>
          <hr />
          <div id="content">
            <?php require("connect.php") ?>

              <p>Post Reply</p>
              <textarea name="reply_content" class='form-control' id='reply_content' rows="5" cols="75"></textarea>
              <br>
              <input type="hidden" class='form-control' name="cid" id='cid' value="<?php echo $cid; ?>" />
              <input type="hidden" class='form-control' name="tid" id="tid" value="<?php echo $tid; ?>" />
              <input type="submit" name="reply_submit" class='btn btn-primary' onclick="PostReply()" value="Post Your Reply" />
              <p id="results"></p>
              <script>
              function PostReply()
              {
                var reply_content = document.getElementById("reply_content").value;
                var cid = document.getElementById("cid").value;
                var tid = document.getElementById("tid").value;
                var results = document.getElementById("results");
                if( reply_content == "" || cid == "" || tid == "" )
                {
                  results.innerHTML = "Ensure none of the fields is empty...";
                  return false;
                }
                else
                {
                  results.innerHTML = "Processing ...";
                  var ajx = new XMLHttpRequest();
                  ajx.open("POST","post_reply_parse.php");
                  ajx.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                  ajx.onreadystatechange = function()
                  {
                    if( ajx.readyState == 4 && ajx.status == 200 )
                    {
                      var data = ajx.responseText;
                      results.innerHTML = data;
                    }
                  }
                  ajx.send("reply_content="+reply_content+"&tid="+tid+"&cid="+cid);
                  return false;
                }
                return false;
              }
              </script>
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


                            <div class="card-body pt-0 mt-0">
                              <div class="avatar z-depth-1-half mb-4">
                                <img src="img/dp1.jpg" class="rounded-circle" alt="First sample avatar image">
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
