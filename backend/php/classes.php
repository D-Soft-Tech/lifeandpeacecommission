<?php

    require_once('db.php');
    
    class Passport{
       public
        $image_ID = 1,
        $image_name,
        $image_ext,
        $image_path;

        public function __construct($image_name, $image_ext, $image_path)
        {
            //$this->image_ID = $imgae_ID;
            $this->image_name = $image_name;
            $this->image_ext = $image_ext;
            $this->image_path = $image_path;
        }

        public function Upload()
        {
            $conn = get_DB();
            $error = array();
            $image_format = array('jpeg','jpg','png');

            /* check whether the user already has passport, if yes echo to the user that he/she already has passport
            i should also create an edit profile page incase the user wants to change some details like passport, phone number, username,
            password etc., but the user should not be able to change (Name and UserID)
            */
            if ($_FILES['image'] && $_FILES['image']['type']) 
            {
                //setting variables for the passport object
                $temp_name = $_FILES['image']['tmp_name'];
                $image_type = strtolower($_FILES['image']['type']);
                $image_size = $_FILES['image']['size'];

                $reset_fileName = explode("/", $image_type);
                
                $file_name = reset($reset_fileName);

                function getNEEDLE(){

                    $image_typ = strtolower($_FILES['image']['type']);
                    $reset_fileNam = explode("/", $image_typ);
                    $file_nam = reset($reset_fileNam);
                    $needle = str_split($file_nam);

                    return $needle;
                }
                //End of variable setting


                if (in_array($this->image_ext, $image_format)===false) {
                    $error[] = "The format, $this->image_ext, is not allowed <br> The permitted image formats are: jpeg, jpg and png";
                }
    
                if ($image_size > 2097152) {
                    $error[] = "The image size is too large, please upload an image of 2mb or less";
                }
                //this block of code is to check if the uploaded file is not an image so as to tell the user to upload an image instead
                //if it is an image, then this block of code is ignored
                if (!empty($_FILES['image']['type']) AND $file_name !== "image") {
                    
                    function result() {
                        $vowel = array("a", "e", "i", "o", "u");
                        $n= getNEEDLE();

                        if (in_array($n[0], $vowel)) {
                            return "an";
                        }
                        else {
                            return "a";
                        }
                    }

                    $article = result();

                    $error[] = "The selected file is not an image, only image is permitted <br> 
                        The selected file is $article $file_name";
                }
    
                if (empty($error)) {
    
                    $q = "INSERT INTO images
                        (
                            image_name,
                            image_ext,
                            image_path
                        )
                        VALUES
                        (
                            :image_name,
                            :image_ext,
                            :image_path
                        )";
                    
                    try {

                        $stmt = $conn->prepare($q);
                        $stmt->bindParam(':image_ext', $this->image_ext);
                        $stmt->bindParam(':image_name', $this->image_name);
                        $stmt->bindParam(':image_path', $this->image_path);
                        //$result = $stmt->execute(['image_ext'=>$this->image_ext, 'image_name'=>$this->image_name, 'image_path'=>$this->image_path]);
                        $result = $stmt->execute();
                    } 
                    catch (PDOException $e) {
                        echo "Image format not supported, please try again";
                    }
                    
                    if ($result===true) {
                        $file_uploaded = move_uploaded_file($temp_name, $this->image_path.$this->image_name);
    
                        if ($file_uploaded===true) {
                            
                            echo "<script>
                            $(document).ready(function(){
                            $('#modal').modal('show');
                            });
                            </script>";
                            
                        }
                    }
                    else{

                        


                    }
                }
                else 
                {
                    echo "Failed to upload because: <br>";
                    $j = 0;
                    for ($i=1; $i <= count($error); ++$i) { 
                        echo "$i . $error[$j] . <br>";
                        ++$j;
                    }
                }
            }
            else {
                echo "Error! <br> No image was selected, please choose a picture to be uploaded";
            }

        }//End of the upload function
    }//End of the passport class


    /*
     $this->image_name = strtolower($_FILES['image']['name']);

        $splitted = explode(".", $this->image_name);
        $this->image_ext = end($splitted);

        $this->image_path = "./images/$this->image_name";

    */

?>