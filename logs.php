<?php
    session_start();
  include_once 'header/header.php';
?>

<style>
        body{
            background: url('images/comp.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .jumbotron{
            width: 60%;
            margin-top: 110px;
            border-radius: 1%;
            opacity: 0.8;
            margin-right: auto;
            margin-left:auto;
        }
        .jumbotron:hover{
            opacity: .95;
        }
    </style>

</head>
<body>
<!-- Navigation Bar Starts -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php"> 
      <img src="images/lpc.jpg" alt="church logo" class="img-responsive img-circle"></a>
      <h5 style="color: white;"> Life And Peace <span class="text-justify">Commission</span></h5>
    </div>

  </div>
</div>
<!--// Navbar Ends--> 


    <div class="mt-5 jumbotron">
        <div id="content">
            <h4 class="modal-title text-center">Sign In</h4>
            <br />
            <form method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label for="username">
                                <i class="fa fa-user"></i>
                            </label>
                        </span>
                        <input type="text" class="form-control" id="username" name="usernameLogin" placeholder="Username" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label for="password">
                                <i class="fa fa-lock"></i>
                            </label>
                        </span>
                        <input type="password" class="form-control" name="passwordLogin" placeholder="Password" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Signin">
                </div>
            </form>
            <div class="text-center text-info">
                <button class="btn btn-link text-info" onclick="show()"> signup Instead</button>
            </div>
        </div>
    </div>

<script>
    //Signup Modal
    var a = '<h4 class="modal-title text-center">Signup</h4>'+
            '<br />'+
            '<div class="">'+
        '<form method="POST">'+
            '<div class="row">'+
                '<div class="col-md-12 mb-3">'+
                    '<div class="form-group">'+
                        '<label for="nameSignup">Name: </label>'+
                        '<input type="text" class="form-control" id="nameSignup" name="nameSignup" placeholder="Full Name" aria-describedby="inputGroupPrepend" required>'+                        
                    '</div>'+
                '</div>'+
                '<div class="col-md-12">'+
                    '<div class="row">'+
                        '<div class="col-md-6 mb-3">'+
                            '<div class="form-group">'+
                                '<label for="telephone">'+
                                    'Phone Number:'+
                                '</label>'+
                                '<input type="phone" class="form-control" id="telephone" name="phone_number" placeholder="Phone number" aria-describedby="inputGroupPrepend" required>'+  
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6 mb-3">'+
                            '<div class="form-group">'+
                                    '<label for="email">'+
                                        'Email:'+
                                    '</label>'+
                                '<input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="inputGroupPrepend" required>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-12 mb-3">'+
                    '<div class="form-group">'+
                            '<label for="address">'+
                                'Address:'+
                            '</label>'+
                        '<input type="text" class="form-control" id="address" name="address" placeholder="Address" aria-describedby="inputGroupPrepend" required>'+
                    '</div>'+
                '</div>'+
                '<div class="col-xs-12 col-md-12">'+
                    '<div class="row">'+
                        '<div class="col-xs-12 col-md-6 mb-3">'+
                            '<div class="form-group">'+
                                    '<label for="usernameSignup">'+
                                        'Username:'+
                                    '</label>'+
                                '<input type="text" class="form-control" id="usernameSignup" name="usernameSignup" placeholder="Choose a Username" aria-describedby="inputGroupPrepend" required>'+
                                
                                '<div id="checkUsername"></div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-xs-12 col-md-6 mb-3">'+
                            '<div class="form-group">'+
                                    '<label for="passwordSignup">'+
                                        'Password:'+
                                    '</label>'+
                                '<input type="password" class="form-control" name="passwordSignup" id="passwordSignup" placeholder="Password" required>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<button type="submit" name="submit" value="submitSignup" class="btn btn-primary btn-block" data-dismissal="modal" type="submit">Signup</button>'+
        '</form>'+
    '</div>';

    function show(){
        document.getElementById("content").innerHTML = a;
    }
</script>
<!-- Bootstrap core JavaScript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/ketchup.all.js"></script> 
<script src="js/fancybox.js"></script>
<script src="assets/fontawesomeForWeb/js/all.js"></script>
<script src="forala/js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="ajax_class.js"></script>

<script>
    function checkUsername(){
        var username = document.getElementById("usernameSignup").value;

        if(username !=="")
        {
            XmlHttp
            (
                {
                    url: 'backend/testing.php',
                    type: 'POST',
                    data: "checkUsername="+username,
                    complete:function(xhr,response,status)
                    {   
                        var responses = response;

                        if(responses =="")
                        {
                            document.getElementById('checkUsername').innerHTML = "<span class='text-success'>"+username+" is available</span>";
                            document.getElementById('check').value = "yes";
                        }else{
                            document.getElementById('checkUsername').innerHTML = response;
                        }
                    }
                }
            );
        }else{
            document.getElementById('checkUsername').innerHTML = "<span class='text-danger'>choose a username</span>";
        }
    }

    // setInterval("checkUsername()", 1000);
</script>
</body>
</html>

<?php
  
  include_once 'life/php/db.php';

  $conn = get_DB();
    
    if(isset($_POST['submit']))
    {
        if($_POST['submit']==="Signin")
        {
            $username = $_POST['usernameLogin'];
            $password = $_POST['passwordLogin'];

            if(!empty($username) && !empty($password))
            {
                $sql = "
                            SELECT * FROM users WHERE username = :username && password = :password
                        ";

                $checker = $conn->prepare($sql);
                $checker->bindParam(':username', $username);
                $checker->bindParam(':password', $password);

                $checkers = $checker->execute();
                $userDetails = $checker->fetch();

                if($checkers===true && !empty($userDetails))
                {
                    // setcookie("full_name", $userDetails['full_name'], time() - 60 * 60 * 24 * 14, '/');
                    // setcookie("phone", $userDetails['phone'], time() - 60 * 60 * 24 * 14, '/');
                    // setcookie("email", $userDetails['email'], time() - 60 * 60 * 24 * 14, '/');
                    // setcookie("username", $userDetails['username'], time() - 60 * 60 * 24 * 14, '/');
                    // setcookie("address", $userDetails['address'], time() - 60 * 60 * 24 * 14, '/');


                    $_SESSION['full_name_frontEnd'] = $userDetails['full_name'];
                    $_SESSION['phone_frontEnd'] = $userDetails['phone'];
                    $_SESSION['email_frontEnd'] = $userDetails['email'];
                    $_SESSION['username_frontEnd'] = $userDetails['username'];
                    $_SESSION['address_frontEnd'] = $userDetails['address'];
                    $_SESSION['password_frontEnd'] = $userDetails['password'];

                    if(!empty($_SESSION['username_frontEnd']))
                    {
                        echo    '<div style="padding-right: 20%; padding-left: 20%;" class="text-center">'.
                                    '<div class="col-sm-12 mr-5 alert alert-success alert-dismissable">'.
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                        '<h6><i class="icon fa pe-7s-check"></i>Loggedin successfully!</h6>'.
                                    '</div>'.
                                    '<button class="btn-transition btn btn-outline-success font-weight-bold text-success"><a href="index.php" class=""> Go back to homepage </a></button>'.
                                '</div>';        
                    }
                }
                else
                {
                  echo    '<div style="padding-right: 20%; padding-left: 20%;">'.
                                '<div class="col-sm-12 mr-5 alert alert-danger alert-dismissable">'.
                                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                    '<h6><i class="icon fa pe-7s-attention"></i>Invalid Username and Password combination!</h6>'.
                                '</div>'.
                            '</div>';
                }
            }
            else
            {
                echo    '<div style="padding-right: 10%; padding-left: 10%;">'.
                            '<div class="col-sm-12 mr-5 alert alert-danger alert-dismissable">'.
                                '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                '<h6><i class="icon fa pe-7s-attention"></i>Invalid Username and Password combination!</h6>'.
                            '</div>'.
                        '</div>';
            }
        }
        elseif($_POST['submit']==="submitSignup")
        {
            $name = $_POST['nameSignup'];
            $email = $_POST['email'];
            $phone = $_POST['phone_number'];
            $address = $_POST['address'];
            $username = $_POST['usernameSignup'];
            $password = $_POST['passwordSignup'];

            if(!empty($name) && !empty($phone) && !empty($email) && !empty($username) && !empty($address))
            {
                $sql = "
                            INSERT INTO users (full_name, email, phone, address, username, password) VALUES(:full_name, :email, :phone, :address, :username, :password)
                        ";

                $checker = $conn->prepare($sql);
                $checker->bindValue(':full_name', $name);
                $checker->bindValue(':email', $email);
                $checker->bindValue(':username', $username);
                $checker->bindValue(':password', $password);
                $checker->bindValue(':phone', $phone);
                $checker->bindValue(':address', $address);

                try {
                    $checkers = $checker->execute();
                    $count = $checker->rowCount();
                    
                } catch (PDOException $e) {
                    //throw $th;
                }

                global $checkers, $count;
                if($checkers===true)
                {
                    $_SESSION['full_name_frontEnd'] = $name;
                    $_SESSION['phone_frontEnd'] = $phone;
                    $_SESSION['email_frontEnd'] = $email;
                    $_SESSION['username_frontEnd'] = $username;
                    $_SESSION['address_frontEnd'] = $address;

                    echo    '<div style="padding-right: 10%; padding-left: 10%;">'.
                                '<div class="col-sm-12 alert alert-success alert-dismissable">'.
                                    '<button aria-hidden="true" data-target="alert" data-dismiss="alert" class="close" type="button">×</button>'.
                                    '<h6><i class="icon fa pe-7s-check"></i>Account has been created Successfully</h6>'.
                                '</div>'.
                            '</div>';
                }
                else
                {
                    echo    '<div style="padding-right: 10%; padding-left: 10%;">'.
                            '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                '<h6><i class="icon fa pe-7s-attention"></i>Username is already taken!</h6>'.
                                '</div>'.
                            '</div>';
                }
            }
            else
            {
                echo    '<div style="padding-right: 10%; padding-left: 10%;">'.
                            '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                                '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                '<h6><i class="icon fa pe-7s-attention"></i>Failed! Please make sure you fill out all details</h6>'.
                            '</div>'.
                        '</div>';
            }
        }else{echo '<div style="padding-right: 10%; padding-left: 10%;">'.
                        '<div class="col-sm-12 alert alert-danger alert-dismissable">'.
                            '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                            '<h6><i class="icon fa pe-7s-attention"></i>Page is currently unavailable please try again later!</h6>'.
                        '</div>'.
                    '</div>';
            }
    }
?>
