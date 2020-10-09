<?php

    class Passport
    {
        public
        $image_name,
        $image_ext,
        $path,
        $full_name,
        $title,
        $role,
        $facebook,
        $twitter;

        public function __construct($image_name, $image_ext, $path, $full_name, $title, $role, $facebook, $twitter)
        {
            $this->image_name = $image_name;
            $this->image_ext = $image_ext;
            $this->path = $path;
            $this->full_name = $full_name;
            $this->title = $title;
            $this->role = $role;
            $this->facebook = $facebook;
            $this->twitter = $twitter;
        }

        public function Upload()
        {

            $error = array();
            $image_format = array('jpeg','jpg','png');

            if ($_FILES['teamPicture']) 
            {
                $files = $_FILES['teamPicture'];
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
                if($this->title ===""){
                    $error[] = "You did not supply the title of the team member";
                }
                if($this->role ===""){
                    $error[] = "You did not supply the role of the team member";
                }
                if($this->twitter ===""){
                    $this->twitter = " ";
                }
                if($this->full_name ===""){
                    $error[] = "You did not supply the name of the person";
                }
                if($this->facebook ===""){
                    $error[] = "You did not supply the link to the team member's facebook handle";
                }
    
                if (empty($error))
                {

                    $sql = "INSERT INTO team
                        (
                            ext,
                            full_name,
                            title,
                            roles,
                            facebook,
                            tweeter
                        )
                        VALUES
                        (
                            :ext,
                            :full_name,
                            :title,
                            :roles,
                            :facebook,
                            :tweeter
                        )";
                    global $conn;
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':ext', $this->image_ext);
                    $stmt->bindValue(':full_name', $this->full_name);
                    $stmt->bindValue(':title', $this->title);
                    $stmt->bindValue(':roles', $this->role);
                    $stmt->bindValue(':facebook', $this->facebook);
                    $stmt->bindValue(':tweeter', $this->twitter);
                    $result = $stmt->execute();

                    $count = $stmt->rowCount();
                    
                    if ($result===true && $count>0) 
                    {
                        $file_uploaded = move_uploaded_file($temp_name, $this->path);
    
                        if ($file_uploaded===true)
                        {
                            $success = '<div class="col-sm-12 alert alert-success alert-dismissable">'.
                                            '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                            '<h6><i class="icon fa pe-7s-check"></i> Success</h6>'.
                                        '</div>';

                            echo $success;
                        }
                        else
                        {
                            echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                        '<h6><i class="icon fa pe-7s-attention"></i>Error adding the member, please try again later</h6>'.
                                    '</div>';
                        }
                    }
                    else
                        {
                            echo    '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                        '<h6><i class="icon fa pe-7s-attention"></i>Error adding the member, please try again later</h6>'.
                                    '</div>';
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
                echo '<script> document.getElementById("update").innerHTML = "Please fill out the role of the team member";</script>';;
            }

        }//End of the upload function
    }//End of the passport classs

?>