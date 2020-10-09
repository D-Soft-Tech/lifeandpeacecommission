<?php

if(isset($_POST['saveAccount']))
{
    if(isset($_POST['title']) && isset($_POST['account_number']) && isset($_POST['bank_name']) && isset($_POST['purpose']))
    {
        $title = $_POST['title'];
        $number = $_POST['account_number'];
        $bank = $_POST['bank_name'];
        $purpose = $_POST['purpose'];

        $sql = "
                    INSERT INTO account (account_name, account_number, purpose, bank_name) VALUES (:account_name, :account_number, :purpose, :bank_name)
                ";

        $check = $conn->prepare($sql);
        $check->bindValue(':account_name', $title);
        $check->bindValue(':account_number', $number);
        $check->bindValue(':purpose', $purpose);
        $check->bindValue(':bank_name', $bank);

        $check = $check->execute();

        if($check === true)
        {
            echo    '<div class="col-sm-12 alert alert-success alert-dismissable">'.
                        '<button aria-hidden="true" data-target="alert" data-dismiss="alert" class="close" type="button">×</button>'.
                        '<h6><i class="icon fa pe-7s-check"></i> Successfully added!</h6>'.
                    '</div>';
        }
        else
        {
            echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                        '<h6><i class="icon fa pe-7s-attention"></i>Unable to add account, please try again later!</h6>'.
                    '</div>';
        }
    }
    else
    {
        echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                    '<h6><i class="icon fa pe-7s-attention"></i> Please fill out all the fields and then continue!</h6>'.
                '</div>';
    }
}

if(isset($_POST['editAccount']) && isset($_POST['checker']))
{
    $id = $_POST['editAccount'];
    // $is_int = is_int($id) ? "true" : "false";  ASSIGNMENT:-  FIND HOW TO CHECK IF A VARIABLE IS AN INTEGER

    $checker = $_POST['checker'];
    $title = $_POST['edit_title'];
    $number = $_POST['eidt_account_number'];
    $purpose = $_POST['edit_purpose'];
    $bank_name = $_POST['edit_bank_name'];

    if($title !== '' && $number !== '' && $purpose !== '' && $bank_name !== '' && $checker ==="editNow")
    {
        $sql = "
                    UPDATE account SET account_name = '$title', account_number = '$number', purpose = '$purpose', bank_name = '$bank_name' WHERE id = '$id'
                ";
        $checks = $conn->prepare($sql);

        $check = $checks->execute();

        $count = $checks->rowCount();

        if($check === true OR $count>0)
        {
            echo    '<div class="col-sm-12 alert alert-success alert-dismissable">'.
                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                        '<h6><i class="icon fa pe-7s-check"></i> Success</h6>'.
                    '</div>';
        }
        else
        {
            $errorMsg =  '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                            '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                            '<h6><i class="icon fa pe-7s-attention"></i> Unable to perform the tast, please try again later</h6>'.
                        '</div>';

            echo $errorMsg;
        }
    }
    else
    {
        echo '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                '<h6><i class="icon fa pe-7s-attention"></i> Please fill out all fields and then proceed</h6>'.
            '</div>';
    }
}

?>

<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper row text-white">
                <div class="col-md-6 widget-content-left">
                    <div class="widget-heading"><h5 class="font-weight-bold">ACCOUNT</h5></div>
                </div>
                <div class="col-md-6">
                    <button class="ml-2 mr-5 pull-right btn-transition btn btn-sm btn-outline-success" data-toggle="modal" data-target="#addAccountModal">
                        Add new account
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4"></div>
</div>

<div class="ml-5">
    <nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="account.php?pages=<?= $Previous; ?>&page=<?= $page; ?>" 
                class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                <span aria-hidden="true">&laquo; </span>
            </a>
        </li>
        <?php 
            $i = $pages > 5 ? $pages - 4 : 1;
            for($i; $i<= $pages; $i++)
            {
            ?>
            <li><a href="account.php?page=<?= $i; ?>&pages=<?= $pages; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
            <?php 
            }
            ?>
        <li>
            <a href="account.php?pages=<?= $Next; ?>&page=<?= $page; ?>"
            class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        </ul>
    </nav>
</div>

<!-- each comments -->
<?php foreach($account as $account) :  ?>
<div class="row" id="<?= $account['id']; ?>">
    <div class="col-xs-12 mb-4 col-md-8">
        <div class="main-card shadow card">
            <div class="card-body">
                <h5><span class="card-title"><?= $account['account_name']; ?> </span></h5> 
                <p class="font-weight-normal"> Account Details: <br />
                    <span><?= $account['account_number']; ?> &nbsp;</span>
                    <span id="date_posted"> <?= $account['bank_name']; ?> &nbsp;</span><br /> <br />
                    Purpose: <?= $account['purpose']; ?>
                </p>
                <span>
                    <button id="<?= $account['id']; ?>" name="<?= $account['account_name']; ?>" value="<?= $account['account_number']; ?>" onclick='edit(this.id, this.name, this.value, "<?= $account["purpose"]; ?>", "<?= $account["bank_name"]; ?>")' class="mb-2 mr-5 btn-transition btn btn-outline-info">
                        edit
                    </button>
                    <button id="<?= $account['id']; ?>" class="mb-2 mr-5 btn-transition btn btn-outline-danger deleteAccount">
                        Delete
                    </button>
                </span>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4"></div>
</div>
<?php endforeach; ?>
<!-- each comments -->

<div class="modal fade bd-example-modal-lg mt-5" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-info">
                <h6 class="card-title">
                    Add Account
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="">
                                    Title of Account
                                </label>
                                <input name="title" id="title" placeholder="Account Name" 
                                    type="text" class="form-control" required>
                            </div>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_number" class="">
                                    Account Number
                                </label>
                                <input name="account_number" id="account_number" 
                                    placeholder="Account Number" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank_name" class="">
                                    Bank Name
                                </label>
                                <input name="bank_name" id="bank_name" placeholder="Name of the Bank" 
                                    type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>      
                    <div class="form-group">
                        <label for="account_purpose" class="">
                            <h6>
                                Purpose
                            </h6>
                        </label>
                        <input name="purpose" id="account_purpose" placeholder="What purpose do you want this account number to serve? Books, Tithes, Offering etc." class="form-control" required>
                    </div>
                    <button name="saveAccount" value="saveAccount" id="" class="mt-1 btn btn-primary btn-block addAccount">Add Account</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg mt-5" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-info">
                <h6 class="card-title">
                    Edit Account
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="edit_title" class="">
                                    Title of Account
                                </label>
                                <input name="edit_title" id="edit_title" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_account_number">
                                    Account Number
                                </label>
                                <input name="eidt_account_number" id="edit_account_number" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_bank_name" class="">
                                    Bank Name
                                </label>
                                <input name="edit_bank_name" id="edit_bank_name" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>      
                    <div class="form-group">
                        <label for="edit_account_purpose" class="">
                            <h6>
                                Purpose
                            </h6>
                        </label>
                        <input type="text" name="edit_purpose" id="edit_account_purpose" class="form-control" required>
                        <input type="text" name="checker" value="" id="checker" class="form-control" hidden>
                    </div>
                    <button type="submit" name="editAccount" value="" id="editAccount" class="mt-1 btn btn-primary btn-block editAccount">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
