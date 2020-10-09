<?php
    include_once 'header_index.php';
    include_once 'php/db.php';

    session_start();

    if(isset($_POST['sign']))
    {
        if(isset($_POST['username']) AND isset($_POST['password']))
        {
            $username_given = $_POST['username'];
            $password_given = $_POST['password'];
            
            $conn = get_DB();
            $sql = "
                    SELECT * FROM admin WHERE admin_user = :username AND admin_password = :password
                ";

            $check = $conn->prepare($sql);
            $check->bindParam(':username', $username_given);
            $check->bindParam(':password', $password_given);

            $check->execute();
            $checker = $check->fetch();

            if($checker)
            {
                $username = $checker['admin_user'];
                $password = $checker['admin_password'];
                $permission = $checker['permission'];
                $admin_name = $checker['admin_name'];

                if($username_given === $username AND $password_given === $password)
                {
                    $_SESSION['username'] = $username_given;
                    $_SESSION['password'] = $password_given;
                    $_SESSION['permission'] = $permission;
                    $_SESSION['name'] = $admin_name;

                    header("Location: home.php");
                }
                else{
                    echo "Wrong User and Password combination";
                }
            }
            else {
                echo "Wrong username and password combination";
            }
        }
        exit();
    }
?>
    <style>
        body{
            background: url('../images/comp.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .jumbotron{
            width: 60%;
            margin-top: 110px;
            border-radius: 1%;
            opacity: 0.80;
            margin-right: auto;
            margin-left:auto;
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
      <img src="../images/lpc.jpg" alt="church logo" class="img-responsive img-circle"></a>
      <h5 style="color: white;"> Life And Peace <span class="text-justify">Commission</span></h5>
    </div>

  </div>
</div>
<!--// Navbar Ends--> 


    <div class="mt-5 jumbotron">
        <h4 class="modal-title text-center">Sign In</h4>
        <br />
        <form action="index.php" method="POST">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <label for="username">
                            <i class="fa fa-user"></i>
                        </label>
                    </span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <label for="password">
                            <i class="fa fa-lock"></i>
                        </label>
                    </span>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" name="sign" value="Sign In">
            </div>
        </form>
    </div>

<?php
    include_once 'footer.php';
?>
</body>
</html>