<?php

    require_once ('donation_class.php');

    if (isset($_POST['submitAddDonation'])) 
    {
        if (isset($_FILES) && isset($_POST))
        {  
            $current_date = date("l, F jS, Y");

            $proposed_date = $_POST['target_date'];

            $proposed_date = strtotime($proposed_date);

            $target_date = date("l, F jS, Y", $proposed_date);



            $title = $_POST['title'];
            $details = $_POST['details'];
            $account = $_POST['account'];
            $target_amount = $_POST['target_amount'];

            $name = strtolower($_FILES['donationPicture']['name']);

            $splitted = explode(".", $name);
            $ext = end($splitted);

            $path = "../images/donation/".$title.".".$ext;

            $passport_obj = new Passport($name, $ext, $path, $title, $current_date, $target_date, $details, $account, $target_amount);
            $passport_obj->Upload();
        }
    }
?>


<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="row alert alert-success fade show" role="alert">
            <div class="col-6">
                <h4 class="fsize-2 font-weight-bold">Donations</h4>
            </div>
            <div class="col-6">
                <button class="ml-auto mr-5 btn-transition btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addDonation">
                    Add donation
                </button>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <!-- This column was left empty intentionally -->
    </div>
</div>

<div class="ml-5">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="donation.php?pages=<?= $Previous; ?>&page=<?= $page; ?>" 
                    class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                    <span aria-hidden="true">&laquo; </span>
                </a>
            </li>
            <?php 
                $i = $pages > 5 ? $pages - 4 : 1;
                for($i; $i<= $pages; $i++)
                {
                ?>
                <li><a href="donation.php?page=<?= $i; ?>&pages=<?= $pages; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                <?php 
                }
                ?>
            <li>
                <a href="donation.php?pages=<?= $Next; ?>&page=<?= $page; ?>"
                class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<?php foreach($donations as $donations) :  ?>
    <div class="row mb-3" id="<?= $donations['id']; ?>">
        <?php

            $propose_date = $donations['target_date'];
                
            $proposed_date = strtotime($propose_date);
            $currentDate = date('F jS, Y');
            $currentTime = strtotime($currentDate);

            if($currentTime < $proposed_date)
            {
            $daysLeft = ceil(abs($proposed_date - $currentTime)/86400). "days left";
            }
            elseif($proposed_date === $currentTime)
            {
            $daysLeft = '0 days left';
            }
            else
            {
            $daysLeft = "Target date passed";
            }


            // getting the amount already raised for the current donation and percentage complete
            $donation_id = $donations['id'];
      
            $sql_transc =   "
                                SELECT sum(amount) AS amount FROM transactions WHERE purpose = 'donation' && purpose_id = '$donation_id'
                            ";

            $pldg_amount = $conn->query($sql_transc);

            $pledged = $pldg_amount->fetchColumn();
            
            $prg_percent = ceil(abs($pledged/$donations['target_amount']) * 100);

        ?>
        <div class="col-xs-12 col-md-8">
            <div class="main-card card">
                <div class="card-body">
                    <h4 class="card-title text-info font-weight-bold"><?= $donations['title'];?></h4>
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-animated bg-success progress-bar-striped" 
                            role="progressbar" style="width: <?= $prg_percent; ?>%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h5 class="text-danger"># <?= number_format($pledged); ?> of #<?= $donations['target_amount'];?> </h5>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <h6><?= $daysLeft;?></h6>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="mt-2 ml-2 mr-5 btn btn-sm">
                            <a href="seeDonators.php?id=<?= $donations['id']; ?>" class="btn-transition btn btn-sm btn-outline-success">See Donators</a>
                        </button>
                        <button type="button" id="<?= $donations['id']; ?>" class="mt-2 ml-5 btn-transition btn btn-sm btn-outline-danger removeDonation">
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <!-- This column was left empty intentionally -->
        </div>
    </div>
<?php endforeach; ?>


<div class="modal fade bd-example-modal-lg mt-5" id="addDonation" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header text-info">
            <h5 class="modal-title">
                Add new donation
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="title">Title</label>
                        <input type="text" placeholder="What is the purpose for the donation" class="form-control" name="title" id="title" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xs-12 col-md-4">
                        <label for="target_date">Target date for the Donation</label>
                        <input type="text" class="form-control" name="target_date" id="target_date" Placeholder="(optional)">
                    </div>
                    <div class="form-group col-xs-12 col-md-4">
                        <label for="account">Account for the donation</label>
                        <select id="account" name="account" class="form-control-sm form-control" required>
                            <?php
                                $sql_account = "
                                            SELECT id, account_name FROM account
                                        ";
                                        
                                $statement = $conn->query($sql_account);
                                while($all_accounts = $statement->fetch()){
                                    echo '<option value="'.$all_accounts['id'].'">' . $all_accounts['account_name'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="target_amount">Target Amount</label>
                        <input type="number" class="form-control" name="target_amount" id="target_amount" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="details">Details</label>
                        <textarea class="form-control fr-view" placeholder="Short note on the reason for the donation" name="details" id="details"></textarea>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="donationPicture">
                        Upload graphics associated with the donation
                    </label>
                    <input type="file" class="form-control" name="donationPicture" id="donationPicture">
                </div>
                <button type="submit" name="submitAddDonation" value="submit" class="btn btn-primary block btm-sm btn-block mt-1">Save</button>
            </form>
        </div>
    </div>
</div>