<?php
  session_start();

  include_once 'life/php/db.php';
  include_once 'header/header2.php';

  $conn = get_DB();

  function disable_button()
  {
    if(isset($_SESSION['username_frontEnd']) && isset($_SESSION['password_frontEnd']) && !empty($_SESSION['username_frontEnd']) && !empty($_SESSION['password_frontEnd']))
    {
        echo "value='submit' name='submitAddComment' type='submit'";
    }
    else{
        echo "data-toggle='tooltip' value='Submit' data-placement='right' type='button' title='You have to login first'";
    }
  }

  ?>
  <style>
    .newJumbotron {
        color: #fff;
        background-image: url("images/news.jpg");
        background-size: cover;
    }
</style>
  <div class="jumbotron newJumbotron" style="height: 40%; margin-top: 50px;">
    <div class="container">
      <div class="col-md-12" style="width: 80%; padding-top: 5%; margin-left: 7%;">
        <p class="text-justiry" style="color: black; font-size: 1.8em;">
          And I will rebuke the devourer for your sakes
          <hr class="bg-success">
        </p>
          <h3 class="pull-right" style="color: black;">-- Malachi 3 : 12</h3`></br />
          <button type="button" data-toggle="modal" data-target="#bankTransferModal" class="btn btn-primary btn-sm pull-right"> Bank Transfer </button>
      </div>
    </div>
  </div>

  <div class="conatainer">
    <div class="row">
      <div class=" col-md-12" style="width: 70%; margin-right: 15%; margin-left: 15%;">
        <form class="jumbotron" method="POST">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
                  <label for="purpose">
                      Purpose
                  </label>
              </span>
              <select id="purpose" name="purpose" class="form-control-sm form-control">
                <option>Tithe</option>
                <option value="offering">Offering</option>
                <option value="personalPledge">Personal Pledge</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="details" name="details" placeholder="Short details" required>
          </div>
          <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon">
                      <label for="amount">
                          Amount
                      </label>
                  </span>
                  <input type="number" id="amount" class="form-control" name="amount" required>
              </div>
          </div>
          <div class="form-group">
            <input class="btn btn-primary btn-lg" <?php disable_button(); ?>>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Bank Transfer modal -->

<div class="modal fade bd-example-modal-lg" id="bankTransferModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">USSD / BANK TRANSFER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                  Choose any of the accounts below if you prefer USSD code or you want to make bank transfer or payment.
                </p>
                <div class="row">
                  <div class="col-md-4 card text-white card-content" style="background-color: rgb(51, 51, 51); 
                  border-color: rgb(51, 51, 51); color: white; margin: 1%; padding: 2px 10px;">
                    <h5 class="text-white card-header card-title" style="color: white;">0122450102</h5>
                    <p class="card-body">
                      OLOYEDE ADEBAYO OLAWALE<br />
                      (GT BANK)
                    </p>
                  </div>

                  <div class="col-md-4 card text-white card-content" style="background-color: #3ACA7D; color: white; margin: 1%; padding: 2px 10px;">
                    <h5 class="text-white card-header card-title" style="color: white;">0122450102</h5>
                    <p class="card-body">
                      OLOYEDE ADEBAYO OLAWALE<br />
                      (GT BANK)
                    </p>
                  </div>
                </div>
                  Please write the purpose of your giving (i.e title, offering or personal pledge) (plus any other message you want to include) 
                  in the description while making the transaction
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
  include_once 'footer/footer.php';
?>

</body>
</html>