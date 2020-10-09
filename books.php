<?php
    session_start();

    require_once 'life/php/db.php';

    $conn = get_DB();

    $limit = 5;
    $page = 1;

    function page()
    {
        global $page;
        if (isset($_GET['page']) && $page <= 1){
            return $_GET['page'];
        }elseif ($page >1){
            return $page;
        }else{
            return 1;
        }
    }

    $page = page();

    $start = ($page - 1) * $limit;
    $result = $conn->query("SELECT * FROM books ORDER BY book_id DESC LIMIT $start, $limit");
    $books = $result->fetchAll();

    $result1 = $conn->query("SELECT count(book_id) AS id FROM books");
    $custCount = $result1->fetchAll();
    $total = $custCount[0]['id'];

    function pages()
    {
        global $pages;
        if(isset($_GET['pages']) && $pages === null){
            return $_GET['pages'];
        }elseif ($pages){
            return $pages;
        }else{
            return 5;
        }
    }

    $pages = pages();

    function previous()
    {
        global $pages;
        if($pages <=5){
            return 5;
        }else{
            return $pages - 5;
        }
    }
    $Previous = previous();

    function nextArrow()
    {
        global $pages, $total, $limit;
        $rem = ceil($total % $limit);
        $div = ceil($total / $limit);

        if($pages >= $div){
            if($rem>0){
                return $div + 4;
            }elseif($rem = 0){
                return $div;
            }
        }
        else
        {
            return $pages + 5;
            }
    }
    	
    $Next = nextArrow();
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
  include_once 'life/php/indexpage.php';
?>

    <div class="subpage-head">
        <div class="container">
            <h3>Our Books</h3>
            <p class="lead">Here are some books authored by our father in the Lord, Apostle Gbade Olorire to help your spiritual growth.</p>
        </div>
    </div>

    <div id="alertMessageDiv">
    </div>

    <div class="ml-5 row mt-0 text-center" style="margin-top: 0px;">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="books.php?pages=<?= $Previous; ?>&page=<?= $page; ?>" 
                        class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                        <span aria-hidden="true">&laquo; </span>
                    </a>
                </li>
                <?php 
                    $i = $pages > 5 ? $pages - 4 : 1;
                    for($i; $i<= $pages; $i++)
                    {
                    ?>
                    <li><a href="books.php?page=<?= $i; ?>&pages=<?= $pages; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                    <?php 
                    }
                ?>
                <li>
                    <a href="books.php?pages=<?= $Next; ?>&page=<?= $page; ?>"
                    class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container has-margin-bottom">
        <div class="row">
            <div class="col-md-9 col-xs-12 has-margin-bottom">
                <?php foreach($books as $books) :  ?>
                <div class="row">
                    <div class="col-md-2 col-xs-6 mx-1">
                        <div class="text-center" id="book-top">
                            <img class="img-resoponsive" src="images/books/<?= $books['book_title']; ?>.<?= $books['ext']; ?>" alt="<?= $books['book_title']; ?>" style="height: 200px; width: 100%;">
                            <h6 class="text-center"><?= $books['price']; ?></h6>
                            <div class="overlay">
                                <button class="btn btn-secondary" onclick="addToCart('<?= $books['book_id']; ?>', '<?= $books['book_title']; ?>')" title="Add to Cart"><i class="fas fa-shopping-cart"></i></button>
                                <button class="btn btn-secondary" title="Buy now"><a href="bookDetails.php?book_id=<?= $books['book_id']; ?>&book_description=<?= $books['book_description'];?>&book_price=<?= $books['price'];?>&book_volume=<?= $books['volume'];?>&book_page=<?= $books['page_count'];?>&book_title=<?= $books['book_title'];?>&book_ext1=<?= $books['ext'];?>&book_ext2=<?= $books['ext2'];?>"> <i class="fas fa-eye"></i></a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-xs-6 ml-3">
                        <h5 class=""><?= $books['book_title']; ?></h5>
                        <p class="card-text text-justify">
                        <?= $books['book_description']; ?> <a href="bookDetails.php?book_id=<?= $books['book_id']; ?>&book_description=<?= $books['book_description'];?>&book_price=<?= $books['price'];?>&book_volume=<?= $books['volume'];?>&book_page=<?= $books['page_count'];?>&book_title=<?= $books['book_title'];?>&book_ext1=<?= $books['ext'];?>&book_ext2=<?= $books['ext2'];?>">&nbsp;Read more →</a>
                        </p>
                    </div>
                    <hr class="">
                </div>
                <?php endforeach; ?>
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

<script src="ajax_class.js"></script>

<script>
    function addToCart(id, name)
    {
        var book_id = id;
        XmlHttp
        (
            {   
                url: 'books.php',
                type: 'POST',
                data: "addToCartId="+book_id+"&addToCartName="+name,
                complete:function(xhr,response,status)
                {   
                   document.getElementById("alertMessageDiv").innerHTML = response; 
                }
            }
        );
    }
</script>
</body>
</html>

<?php
    if(isset($_POST['addToCartId'])){
        $book_id = $_POST['addToCartId'];
        $book_name = $_POST['addToCartName'];

        $message =  '<div class="alert alert-success alert-dismissable mt-2" style="margin-right: 10%; margin-top: 10px; margin-bottom: 0px; margin-left: 10%;">'.
                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                        '<div class="">'.
                            '<h6><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp; The book has been added to your cart</h6>'.
                        '</div>'.
                    '</div>';
        
        echo $message;
    } 
?>