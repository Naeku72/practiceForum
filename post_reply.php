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
                                    <h3 class="mb-3 font-weight-bold"><strong>Anna Deynah</strong></h3>
                                    <h6 class="font-weight-bold blue-text mb-4">Web Designer</h6>
                                </div>

                                <ul class="striped list-unstyled">
                                    <li><strong>E-mail address:</strong> a.doe@example.com</li>

                                    <li><strong>Phone number:</strong> +1 234 5678 90</li>

                                    <li><strong>Company:</strong> The Company, Inc</li>

                                    <li><strong>Twitter username:</strong> @anna.doe</li>

                                    <li><strong>Instagram username:</strong> @anna.doe</li>
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
