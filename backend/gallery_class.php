<?php

    class Passport
    {
        public
        $image_name,
        $image_ext,
        $path,
        $title,
        $day,
        $month,
        $year;

        public function __construct($image_name, $image_ext, $path, $title, $day, $month, $year)
        {
            $this->image_name = $image_name;
            $this->image_ext = $image_ext;
            $this->path = $path;
            $this->title = $title;
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
        }

        public function Upload()
        {

            $error = array();
            $image_format = array('jpeg','jpg','png');

            if ($_FILES['photo']) 
            {
                $files = $_FILES['photo'];
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
                    $error[] = "You did not supply any title of the photo";
                }
    
                if (empty($error))
                {

                    $q = "INSERT INTO gallery
                        (
                            ext,
                            title,
                            day,
                            month,
                            year
                        )
                        VALUES
                        (
                            :ext,
                            :title,
                            :day,
                            :month,
                            :year
                        )";
                    global $conn;
                    $stmt = $conn->prepare($q);
                    $stmt->bindValue(':ext', $this->image_ext);
                    $stmt->bindValue(':title', $this->title);
                    $stmt->bindValue(':day', $this->day);
                    $stmt->bindValue(':month', $this->month);
                    $stmt->bindValue(':year', $this->year);
                    $result = $stmt->execute();
                    
                    if ($result===true) 
                    {
                        $file_uploaded = move_uploaded_file($temp_name, $this->path);
    
                        if ($file_uploaded===true) {
                            $success = '<div class="col-sm-12 alert alert-success alert-dismissable">'.
                                            '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                            '<h6><i class="icon fa pe-7s-check"></i> The Photo has been successfully added to the photo album </h6>'.
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
                echo '<script> document.getElementById("update").innerHTML = "Please fill out the details of the photo";</script>';;
            }

        }//End of the upload function
    }//End of the passport classs

?>