<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Life and peace Commission; is church value is reaching the unsaved in the remotest and interior part of the world while equipping the saint for service.
The three most essential aspect of our family are: Sound Teachings, Sweet Fellowship and Strong Prayers">
<meta name="keywords" content="Church, Website, Strong Prayers, Sound Teachings, Sweet Fellowship, Mount Zion Fortress, Life and Peace, Descipleship, Knowing the Christ, Intimacy with the Father">
<meta name="author" content="Oloyede Adebayo (+2349075771869)">
<title>Life and Peace Commission - Mount Zion Fortress</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Church Template CSS -->
<link href="css/church.css" rel="stylesheet">
<link href="css/fancybox.css" rel="stylesheet">
<link href="css/books.css" rel="stylesheet">
<link href="assets/fontawesomeForWeb/css/all.css">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

<!-- Favicons -->
<link rel="shortcut icon" href="images/favicon.png">

<!-- Custom Google Font : Montserrat and Droid Serif -->

<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- Navigation Bar Starts -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php"> <img src="images/lpc.jpg" alt="church logo" class="img-responsive img-circle"></a> <h5 style="color: white;"> Life And Peace <span class="text-justify">Commission</span></h5></div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">HOME</a></li>
        <li><a href="about.php">ABOUT</a></li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">SERMONS <span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-left" role="menu">
            <li><a href="sermons.php">Christ-Occupied</a></li>
            <li><a href="sermons.php">God's Love</a></li>
            <li><a href="sermons.php">Faithfulness</a></li>
            <li><a href="sermons.php">Praise Him</a></li>
          </ul>
        </li>
        <li><a href="books.php">BOOKS</a></li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-left" role="menu">
            <li><a href="image-gallery.php">Image Gallery</a></li>
            <li><a href="video-gallery.php">Video Gallery</a></li>
            <li><a href="blog.php">Bulletin</a></li>
            <li><a href="events-programs.php">Events &amp; Programs</a></li>
            <li><a href="event-calendar.php">Event Calendar</a></li>
            <li><a href="charity-donation.php">Charity &amp; Donations</a></li>
            <li><a href="prayers.php">Testimonies</a></li>
          </ul>
        </li>
        <li><a href="contact.php">Give Online</a></li>
        <li><a href="contact.php">CONTACT</a></li>
        <?php
            function href()
            {
            if(!isset($_SESSION['username_frontEnd']) && !isset($_SESSION['password_frontEnd']))
            {
            echo "<li class='dropdown'>". 
                    "<a href='logs.php'>".
                        "<b>Login</b>".
                    "</a>".
                    "</li>";
            }
            else
            {
                echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>'.$_SESSION['username_frontEnd'].'<span class="caret"></span></b></a>';
            }
            }

            href();

            function is_loggedIn()
            {
            if(isset($_SESSION['username_frontEnd']) && isset($_SESSION['password_frontEnd']))
            {
                echo  '<ul class="dropdown-menu dropdown-menu-left" role="menu">'.
                        '<li>'.
                        '<a href="" class="mr-0 pr-0 dropdown-item" data-toggle="modal" data-target="#loginModal"><b>Log out</b></a>'.
                        '</li>'.
                    '</ul>';
            }
            }

            is_loggedIn();
        ?>
        </li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
    
  </div>
</div>
<!--// Navbar Ends--> 

<?php
  include_once 'life/php/db.php';
  include_once 'life/php/indexpage.php';
?>

    <!-- Getting the details of book sent in from books.php -->
    <?php

        $sanitizer = filter_var_array($_GET, FILTER_SANITIZE_STRING);
        $book_id = $sanitizer['book_id'];
        $book_description = $sanitizer['book_description'];
        $book_price = $sanitizer['book_price'];
        $book_volume = $sanitizer['book_volume'];
        $book_page = $sanitizer['book_page'];
        $book_title = $sanitizer['book_title'];
        $book_ext1 = $sanitizer['book_ext1'];
        $book_ext2 = $sanitizer['book_ext2'];


    ?>

    <div class="subpage-head has-margin-bottom">
        <div class="container">
            <h4 class="text-center"><?= $book_title; ?></h4>
        </div>
    </div>

    <div class="container has-margin-bottom">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                <div class="row">
                    <div class="col-xs-12 has-margin-bottom">
                        <div class="row">
                            <div class="col-xs-12 col-md-3 container" id="book-top" style="border-right: 2px solid;">
                                <img src="images/books/<?= $book_title; ?>.<?= $book_ext1; ?>" style="height: 300px; width: 100%;" alt="" class="image-responsive">
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h6 Class="bg-success" style="padding: 10px;">Details</h6>
                                    </div>
                                    <div class="col-xs-12" style="margin-left: 20px; line-height: 1.5;">
                                        <p>Price: <span><b><?= $book_price; ?></b></span></p>
                                        <p>Volume: <span><b><?= $book_volume; ?></b></span></p>
                                        <p>Pages: <span><b><?= $book_page; ?></b></span></p>
                                        <br />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"><button type="submit" class="btn-transition btn btn-success" title="buy now"><i class="fa fa-credit-card"></i></button></div>
                                    <div class="col-md-4"><button type="submit" class="btn-transition btn btn-success" title="Add to cart"><i class="fa fa-cart-plus"></i></button></div>
                                    <div class="col-md-4"><button type="submit" title="Go Back to Books" class="btn-transition btn btn-success"><i class="fa fa-arrow-left"></i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 jumbotron ">
                        <h4 class="text-success">Preface</h4>
                        <p class="card-text text-justify" id="details" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 2.0;">
                            <?= $book_description; ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- side bar -->
            <div class="col-md-3 col-xs-12 visible-md-block visible-xs-block visible-lg-block">
                <div class="well">
                    <div class="section-title">
                        <h4> Book Archive </h4>
                    </div>
                    <div class="list-group">
                        <div class="row">
                            <div class="col-xs-5">
                                <i class="fas fa-shopping-cart fa-2x"></i>&nbsp;
                                <sup><span class="badge">0</span></sup>
                            </div>
                            <div class="col-xs-7">
                                <a href="payment.php" role="button" class="btn btn-success">pay</a>
                            </div>
                        </div>
                        <br />
                        <div>
                            <div class="blog-search has-margin-xs-bottom">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search glyphicon-lg"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div id="book_search"></div>
                        </div>
                        <h6>New Arrivals</h6> 
                        <a href="#" class="list-group-item">
                            <p class="list-group-item-heading">Heavens and the earth Heavens and the earth</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <p class="list-group-item-heading">Heavens and the earth</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <p class="list-group-item-heading">Heavens and the earth</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <p class="list-group-item-heading">Heavens and the earth</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <p class="list-group-item-heading">Heavens and the earth</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <p class="list-group-item-heading">Heavens and the earth</p>
                        </a>
                    </div>
                </div>
            </dvi>
        </div>
    </div>
</div>
<?php
  include_once 'footer/footer.php';
?>

</body>
</html>