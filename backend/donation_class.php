<?php

    class Passport
    {
        public
        $image_name,
        $image_ext,
        $path,
        $title,
        $current_date,
        $target_date,
        $details,
        $account,
        $target_amount;

        public function __construct($image_name, $image_ext, $path, $title, $current_date, $target_date, $details, $account, $target_amount)
        {
            $this->image_name = $image_name;
            $this->image_ext = $image_ext;
            $this->path = $path;
            $this->title = $title;
            $this->current_date = $current_date;
            $this->target_date =$target_date;
            $this->details = $details;
            $this->account = $account;
            $this->target_amount = $target_amount;
        }

        public function Upload()
        {

            $error = array();
            $image_format = array('jpeg','jpg','png');

            if ($_FILES['donationPicture']) 
            {
                $files = $_FILES['donationPicture'];
                //setting variables for the passport object
                $temp_name = $files['tmp_name'];
                $image_type = strtolower($files['type']);
                $image_size = $files['size'];
                
                //End of variable setting


                if (in_array($this->image_ext, $image_format)===false) {
                    $error[] = "The format, $this->image_ext, is not allowed <br> The permitted image formats are: jpeg, jpg and png";
                }
    
                if ($image_size > 20971520) {
                    $error[] = "The image size is too large, please upload an image of 10mb or less";
                }
                if($this->target_date ===""){
                    $this->target_date = " ";
                }
                if($this->details ===""){
                    $error[] = "You did not supply the details of the donation";
                }
                if($this->target_amount ===""){
                    $error[] = "You did not supply the target amount of the donation";
                }
                if($this->title ===""){
                    $error[] = "You did not supply the title of the donation";
                }
                if($this->account ===""){
                    $error[] = "You did not choose any account for receiving of the donation";
                }
    
                if (empty($error))
                {

                    $q = "INSERT INTO donation
                        (
                            ext,
                            title,
                            date_posted,
                            target_date,
                            details,
                            account_id,
                            target_amount
                        )
                        VALUES
                        (
                            :ext,
                            :title,
                            :date_posted,
                            :target_date,
                            :details,
                            :account_id,
                            :target_amount
                        )";
                    global $conn;
                    $stmt = $conn->prepare($q);
                    $stmt->bindValue(':ext', $this->image_ext);
                    $stmt->bindValue(':title', $this->title);
                    $stmt->bindValue(':date_posted', $this->current_date);
                    $stmt->bindValue(':target_date', $this->target_date);
                    $stmt->bindValue(':details', $this->details);
                    $stmt->bindValue(':account_id', $this->account);
                    $stmt->bindValue(':target_amount', $this->target_amount);
                    $result = $stmt->execute();
                    
                    if ($result===true) 
                    {
                        $file_uploaded = move_uploaded_file($temp_name, $this->path);
    
                        if ($file_uploaded===true) {
                            $success = '<div class="col-sm-12 alert alert-success alert-dismissable">'.
                                            '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                            '<h6><i class="icon fa pe-7s-check"></i> donation added successfully</h6>'.
                                        '</div>';

                        echo $success;

                        }
                    }
                }
                else 
                {
                    echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                '<h6><i class="icon fa pe-7s-attention"></i>'. "Failed to upload because: <br>";
                                    $j = 0;
                                    for ($i=1; $i <= count($error); ++$i) { 
                                        echo $i . ". ". $error[$j]. "<br />";
                                        ++$j;
                                    }
                    echo        '</h6>'.
                            '</div>';
                }
            }
            else
            {
                echo '<script> document.getElementById("update").innerHTML = "Please fill out the details of the donation";</script>';;
            }

        }//End of the upload function
    }//End of the passport classs

?>