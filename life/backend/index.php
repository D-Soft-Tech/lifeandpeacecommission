<?php
    include_once '../php/db.php';

    $conn = get_DB();
    session_start();

    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        $sql = "
                    SELECT admin_user, admin_password FROM admin WHERE admin_user = :username AND admin_password = :password
                ";

        $check = $conn->prepare($sql);
        $check->bindParam(':username', $username);
        $check->bindParam(':password', $password);

        $check = $check->execute();

        if($check === true){
            include_once 'header.php';
        ?>
            <style>
                body{
                    background: url('../../images/comp.jpg');
                    background-repeat: no-repeat;
                    background-size: cover;
                }
                .jumbotron{
                    opacity:0.9;
                    background-color: #3D7691;
                    color: white;
                }
                .jumbotron:hover{
                    opacity: 0.9;
                }
            </style>
        <?php
            include_once 'nav.php';
        ?>
            <!-- HTML CODE GOES HERE -->
            <div class="container" style="margin-top: 100px;">
                <div class="jumbotron" style="width:60%;  margin-top: 5%; margin-right:auto; margin-left: auto;">
                    <h4 class="text-center">Upload Book</h4>
                    <br />
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title">Book Title</label>
                                <input type="text" class="form-control" id="title">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="volume">Volume</label>
                                <input type="number" class="form-control" name="volume" id="volume">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="pages">Number of Pages <small>(optional)</small></label>
                                <input type="number" class="form-control" name="pages" id="pages">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="book">
                                    Upload the pdf
                                </label>
                                <input type="file" class="form-control" id="book" name="book_pdf">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pix">
                                    Book back cover
                                </label>
                                <input type="file" class="form-control" id="pix" name="image">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="details">Description</label>
                                <textarea type="text" class="form-control fr-view" name="details" id="details">
                                Short Description about the book
                                </textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary block btm-sm">Save Book</button>
                    </form>
                </div>
            </div>
            <!-- HTML CODE ENDS HERE -->
        <?php
            include_once 'footer.php';
        ?>
            <script>
                var forala = new FroalaEditor('textarea');
            </script>
        <?php
        }
        else{
            header("Location: login.php");
        }
    }
    else{
            header("Location: login.php");
    }
?>
</body>
</html>