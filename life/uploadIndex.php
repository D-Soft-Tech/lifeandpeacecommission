<!DOCTYPE html>..<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">   
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../e-Exam/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fontawesomeForWeb/css/all.css">
        <link rel="stylesheet" href="../e-Exam/assets/forala/css/froala_editor.css">
        <link rel="stylesheet" href="../e-Exam/assets/forala/css/froala_style.css">
    </head>
<body>
<div class="container">
    <p>
        <h5>Profile Picture</h5>
    </p>    
    <div style="max-width: 40%;">
    <form method="POST" action="index.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">
                Image Name:
            </label>
            <input type="text" class="form-control" id="id" name="image_name" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="pix">
                Upload Picture:
            </label>
            <input type="file" class="form-control" id="pix" name="image">
        </div>    
        <input type="submit" class="text-center btn btn-primary btn-sm" name="submit" value="Upload">
    </form>
    </div>
    <div class="modal fade" role="modal" id="modal">
        <div class="modal-dialog">
            <div class="alert alert-warning alert-dismissible fade show text-center text-white bg-success" role="alert">
                Success       
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div> 
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->    
<script src="../e-Exam/assets/js/jquery.min.js" ></script> 
<script src="../e-Exam/assets/js/popper.min.js" ></script> 
<script src= "../e-Exam/assets/js/bootstrap.min.js" ></script>
<?php 
    require_once('classes/classes.php');
    
    if (isset($_POST['submit']))
    {
        $name = strtolower($_FILES['image']['name']);          
        $splitted = explode(".", $name);
        $ext = end($splitted);          
        $path = "./images/";
        $passport_obj = new Passport($name, $ext, $path);   
        $passport_obj->Upload();
    
    }
?>  
</body>..
</html>