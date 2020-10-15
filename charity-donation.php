<?php
  session_start();

  require_once 'life/php/db.php';
  
  include_once 'header/header2.php';

  $conn = get_DB();

  $result = $conn->query("SELECT * FROM donation WHERE status = 'on_going'");
  $check = $result->fetchAll();

    if(isset($_GET['searchDonationById']) && !empty($check))
    {
        $sanitizer = filter_var_array($_GET, FILTER_SANITIZE_STRING);

        $donationID = $_GET['searchDonationById'];
        
        $result = $conn->query("SELECT * FROM donation WHERE id = '$donationID' && status = 'on_going'");
        $donations = $result->fetch();
    
      ?>
      
      <!--SUBPAGE HEAD-->
      
      <div class="subpage-head" style="margin-bottom: 20px;">
        <div class="container">
          <h4><?= $donations['title']; ?></h4>
          <h6 class="lead text-danger">Target Date:&nbsp; <?= $donations['target_date']; ?></h6>
        </div>
      </div>
      
      <!-- // END SUBPAGE HEAD -->
      
      <div class="container">
        <div class="row">
          <div class="col-md-8 has-margin-bottom">
            <div class="row">
              <div class="col-12" style="margin-right: 15px; margin-left: 15px;">
                <article class="blog-content">
                  <img src="images/donation/<?= $donations['title']; ?>.<?= $donations['ext']; ?>" alt="charity donation" class="img-responsive has-margin-xs-bottom" style="width: 100%;">
                  <p class= "text-justify"><?= $donations['details']; ?></p>
                </article>
              </div>
            </div>
          </div>
          <!--// col md 9--> 
          
          <!--Sidebar-->
          <div class="col-md-4"> 
            
            <!--Donate Box-->
            <div class="charity-box has-margin-xs-bottom">
              <div class="charity-desc">
                <?php
      
                  $donation_id = $donations['id'];
      
                  $sql_transc = "
                                  SELECT amount FROM transactions WHERE purpose = 'donation' && purpose_id = :id  && transc_status = 'on_going'
                                ";
      
                  $pldg_amount = $conn->prepare($sql_transc);
                  $pldg_amount->bindParam(':id', $donation_id);
                  $pldg_amount->execute();
      
                  $pledged = 0;
      
                  while($pldg_resource = $pldg_amount->fetchColumn())
                  {
                    $pledged += $pldg_resource;
                  }
                  
                  $prg_percent = ceil(abs($pledged/$donations['target_amount']) * 100);
      
      
                ?>
                <h2 class="pledged-amount has-no-margin">#<?php echo number_format($pledged); ?></h2>
                <p>Pledged out of <span class="text-danger"> #<?= number_format($donations['target_amount']); ?></span> goal</p>
                <div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $prg_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $prg_percent; ?>%"><span class="sr-only"><?= $prg_percent; ?>% Complete</span><?= $prg_percent; ?>%</div>
                </div>
                <div class="clearfix">
                  <div>
                    <?php
                        $proposed_date = $donations['target_date'];
      
                        $proposed_date = strtotime($proposed_date);
                        $currentTime = time();
      
                        $daysLeft = ceil(abs($proposed_date - $currentTime)/86400);
                    ?>
                    <h3 class="pledged-amount text-center text-danger"><?= $daysLeft; ?></h3>
                    <p class="text-center text-danger">Days left</p>
                  </div>
                </div>
                <div class="text-center has-margin-xs-top"> <a href="#" class="btn btn-lg btn-primary">Donate Now →</a> </div>
              </div>
            </div>
            <!--// END Donate Box-->
            
            <div class="vertical-links has-margin-xs-bottom">
              <h4>Other Donations</h4>
              <?php
      
                $sql_donations = "
                                    SELECT * FROM donation WHERE status = 'on_going'
                                  ";
      
                $stmtAll = $conn->prepare($sql_donations);
                $stmtAll->execute();
      
              ?>
              <ul class="list-unstyled">
                <?php
                  while($allDonations1 = $stmtAll->fetch())
                  {
                  ?>
                    <li><a href="charity-donation.php?searchDonationById=<?= $allDonations1['id']; ?>"><?= $allDonations1['title']; ?></a></li>
                <?php
                  }
                ?>
              </ul>
            </div>
            <div class="tag-cloud has-margin-bottom"> <a href="#">catholic</a> <a href="#">bulletin</a> <a href="#">programs</a> <a href="#">events</a> <a href="#">church</a> <a href="#">charity</a> <a href="#">website</a> <a href="#">template</a> <a href="#">non-profit</a> <a href="#">belief</a> <a href="#">ministry</a> <a href="#">sermon</a> <a href="#">nature</a> </div>
          </div>
        </div>
      </div>
    <?php
    }
    elseif (!isset($_GET['searchDonationById']) && !empty($check)){
        $result = $conn->query("SELECT * FROM donation WHERE status = 'on_going' LIMIT 1, 1");
        $donations = $result->fetch();

        include_once 'header/header2.php';
      ?>
          
          <!--SUBPAGE HEAD-->
          
          <div class="subpage-head" style="margin-bottom: 20px;">
            <div class="container">
              <h4><?= $donations['title']; ?></h4>
              <h6 class="lead text-danger">Target Date:&nbsp; <?= $donations['target_date']; ?></h6>
            </div>
          </div>
          
          <!-- // END SUBPAGE HEAD -->
          
          <div class="container">
            <div class="row">
              <div class="col-md-8 has-margin-bottom">
                <div class="row">
                  <div class="col-12" style="margin-right: 15px; margin-left: 15px;">
                    <article class="blog-content">
                      <img src="images/donation/<?= $donations['title']; ?>.<?= $donations['ext']; ?>" alt="charity donation" class="img-responsive has-margin-xs-bottom" style="width: 100%;">
                      <p class= "text-justify"><?= $donations['details']; ?></p>
                    </article>
                  </div>
                </div>
              </div>
              <!--// col md 9--> 
              
              <!--Sidebar-->
              <div class="col-md-4"> 
                
                <!--Donate Box-->
                <div class="charity-box has-margin-xs-bottom">
                  <div class="charity-desc">
                    <?php
          
                      $donation_id = $donations['id'];
          
                      $sql_transc = "
                                      SELECT amount FROM transactions WHERE purpose = 'donation' && purpose_id = :id  && transc_status = 'on_going'
                                    ";
          
                      $pldg_amount = $conn->prepare($sql_transc);
                      $pldg_amount->bindParam(':id', $donation_id);
                      $pldg_amount->execute();
          
                      $pledged = 0;
          
                      while($pldg_resource = $pldg_amount->fetchColumn())
                      {
                        $pledged += $pldg_resource;
                      }
                      
                      $prg_percent = ceil(abs($pledged/$donations['target_amount']) * 100);
          
          
                    ?>
                    <h2 class="pledged-amount has-no-margin">#<?php echo number_format($pledged); ?></h2>
                    <p>Pledged out of <span class="text-danger"> #<?= number_format($donations['target_amount']); ?></span> goal</p>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $prg_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $prg_percent; ?>%"><span class="sr-only"><?= $prg_percent; ?>% Complete</span><?= $prg_percent; ?>%</div>
                    </div>
                    <div class="clearfix">
                      <div>
                        <?php
                            $proposed_date = $donations['target_date'];
          
                            $proposed_date = strtotime($proposed_date);
                            $currentTime = time();
          
                            $daysLeft = ceil(abs($proposed_date - $currentTime)/86400);
                        ?>
                        <h3 class="pledged-amount text-center text-danger"><?= $daysLeft; ?></h3>
                        <p class="text-center text-danger">Days left</p>
                      </div>
                    </div>
                    <div class="text-center has-margin-xs-top"> <a href="#" class="btn btn-lg btn-primary">Donate Now →</a> </div>
                  </div>
                </div>
                <!--// END Donate Box-->
                
                <div class="vertical-links has-margin-xs-bottom">
                  <h4>Other Donations</h4>
                  <?php
          
                    $sql_donations = "
                                        SELECT * FROM donation WHERE status = 'on_going'
                                      ";
          
                    $stmtAll = $conn->prepare($sql_donations);
                    $stmtAll->execute();
          
                  ?>
                  <ul class="list-unstyled">
                    <?php
                      while($allDonations = $stmtAll->fetch())
                      {
                      ?>
                        <li><a href="charity-donation.php?searchDonationById=<?= $allDonations['id']; ?>"><?= $allDonations['title']; ?></a></li>
                    <?php
                      }
                    ?>
                  </ul>
                </div>
                <div class="tag-cloud has-margin-bottom"> 
                  <a href="blog.php">bulletin</a> 
                  <a href="events-programs.php">programs</a>
                  <a href="events-programs.php">events</a> 
                  <a href="index.php">church</a>
                  <a href="charity-doantion.php">donation</a> 
                  <a href="image-gallery.php">gallery</a> 
                  <a href="#">audio messages</a>
                  <a href="#">video messages</a> 
                  <a href="about.php">about</a>
                  <a href="contact.php">contact</a> 
                </div>
              </div>
            </div>
          </div>
    <?php
    }
    else
    {
    ?>
      <div class="subpage-head" style="margin-bottom: 20px;">
        <div class="container">
          <h4>Thank You for checking</h4>
          <h6 class="lead text-danger">But there is no ongoing donation at the moment!!! <br /> <br /> Please check back later</h6>
        </div>
      </div>

    <?php
    }

      include_once 'footer/footer.php';
    ?>
    
    </body>
    </html>