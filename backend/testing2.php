<?php 

include_once 'php/db.php';

$conn = get_DB();

if (isset($_POST['files'])) 
{
    echo $_POST['files'];

    // $error = array();
    // $image_format = array('jpeg','jpg','png');

    // if ($_POST['files']) 
    // {
    // $files = $_POST['files'];

    // $name = $files['name'];

    // $splitted = explode(".", $files);
    // $ext = end($splitted);

    //     //setting variables for the passport object
    //     $temp_name = $files['tmp_name'];
    //     $image_type = strtolower($files['type']);
    //     $image_size = $files['size'];
    
    //     //End of variable setting


    //     if (in_array($this->image_ext, $image_format)===false) {
    //         $error[] = "The format, $this->image_ext, is not allowed <br> The permitted image formats are: jpeg, jpg and png";
    //     }

    //     if ($image_size > 20971520) {
    //         $error[] = "The image size is too large, please upload an image of 10mb or less";
    //     }

    //     if (empty($error)) {

    //         echo '<img src="'.$name.'" alt="" class="image-responsive" style="height: 200px; width: 380px;">';
    //     }
    //     else 
    //     {
    //         $warning = "Failed to upload because: <br>";
    //         $j = 0;
    //         for ($i=1; $i <= count($error); ++$i) { 
    //             $errorPreview .= "$i . $error[$j] . <br>";
    //             ++$j;
    //         }
    //         echo $warning;
    //     }
    // }
    // else {
    //     echo "please choose a picture to be uploaded";
    // }
    exit();
}
?>