<?php
include_once 'php/db.php';

$conn = get_DB();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/forala/css/froala_editor.pkgd.min.css">
    <title>Document</title>
</head>
<body>
<!-- The pending contact messages are being looped here -->
    <div class="main-card mb-3 card">
        <div class="card-header">thanks</div>
        <div class="card-body">
            <p><span class="card-title">ade &nbsp;</span>
                <span>
                ade@gmail.com 09075771869
                </span>
            </p>
            Thank you Jesus
        </div>
        <div class="card-footer">
            <button id="respondmodal" name="Mr Oloyede" value="oloyede@gmail.com" class="mb-2 mr-5 btn-transition btn btn-outline-success view">
                Respond
            </button>
            <button id='1' onclick="markAsRead(this.id)" class="mb-2 mr-5 btn-transition btn btn-outline-info">
                Mark as read
            </button>
            <button class="mb-2 mr-5 btn-transition btn btn-outline-danger">
                Delete
            </button>
        </div>
    </div>
<!-- End of Pending contact messages -->


<!--Respond to Contact -->
<div id="update"></div>
<div class="modal fade" id="modalbox">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="add">
            <div class="modal-header">
                <h6 class="modal-title" id="destination">
                    Responding to <span id="receiver"></span> via <span id="rEmail"></span>    
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="modal.php" method="POST">
                    <div class="form-group">
                        <label for="exampleEmail">
                            <h6>
                                Summarize your response to <span id="receiver2"></span> in few words
                            </h6>
                        </label>
                        <input type="text" name="title" id="exampleEmail" placeholder="(optional)" class="form-control">
                    </div>            
                    <div class="position-relative form-group">
                        <label for="exampleText" class="">
                            <h6>
                                Your response in full details
                            </h6>
                        </label>
                        <textarea type="text" id="exampleText" class="form-control fr-view" name="details"></textarea>
                    </div>
                    <button type="submit" name="send" value="submit" class="mt-1 btn btn-primary btn-block">
                        Send Response
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Respond to Contact ends here -->
<script type="text/javascript" src="../assets/bootstrap-4.4.1-dist/js/jquery.js"></script>
<script type="text/javascript" src="../assets/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="../assets/forala/js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="../ajax_class.js"></script>
<script>
    $(document).ready(function (){
        $('.view').click(function (){
            var name = $(this).attr("name");
            var email = $(this).attr("value");

            document.getElementById('receiver').innerHTML = name;
            document.getElementById('rEmail').innerHTML = email;

            
            $('#modalbox').modal('show');
        });
    });

    function markAsRead(id){
        XmlHttp
            (
                {
                    url: 'testing.php',
                    type: 'POST',
                    data: "user_id="+id,
                    complete:function(xhr,response,status)
                        {
                            document.getElementById('update').innerHTML = response;
                        }
                    }
                }
            );
    }
</script>
</body>
</html>
<?php 
    if(isset($_POST["send"])){
        echo 'good';
    }
?>