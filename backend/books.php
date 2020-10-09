<?php
    include_once 'php/db.php';

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
        ?>
            <!-- the main page starts from here -->

            <!doctype html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta http-equiv="Content-Language" content="en">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <title>Admin Dashboard - Mount Zion Fortres</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
                <meta name="msapplication-tap-highlight" content="no">
                <link href="../css/books.css" rel="stylesheet">
                <link rel="stylesheet" href="../assets/forala/css/froala_editor.pkgd.min.css">
                <link href="./main.css" rel="stylesheet">
                </head>
            <body>
                <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
                    <!-- Include the header file here via php -->
                        <?php
                            include_once 'header.php';
                        ?>
                    <!-- Header file inclusion ends here -->

                    <!-- Color settings -->
                        <div class="ui-theme-settings">
                            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
                            </button>
                            <div class="theme-settings__inner">
                                <div class="scrollbar-container">
                                    <div class="theme-settings__options-wrapper">
                                        <h3 class="themeoptions-heading">Layout Options
                                        </h3>
                                        <div class="p-3">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                                    <div class="switch-animate switch-on">
                                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Fixed Header
                                                                </div>
                                                                <div class="widget-subheading">Makes the header top fixed, always visible!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                                    <div class="switch-animate switch-on">
                                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Fixed Sidebar
                                                                </div>
                                                                <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                                    <div class="switch-animate switch-off">
                                                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Fixed Footer
                                                                </div>
                                                                <div class="widget-subheading">Makes the app footer bottom fixed, always visible!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="themeoptions-heading">
                                            <div>
                                                Header Options
                                            </div>
                                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                                                Restore Default
                                            </button>
                                        </h3>
                                        <div class="p-3">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h5 class="pb-2">Choose Color Scheme
                                                    </h5>
                                                    <div class="theme-settings-swatches">
                                                        <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light">
                                                        </div>
                                                        <div class="divider">
                                                        </div>
                                                        <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="themeoptions-heading">
                                            <div>Sidebar Options</div>
                                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                                                Restore Default
                                            </button>
                                        </h3>
                                        <div class="p-3">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h5 class="pb-2">Choose Color Scheme
                                                    </h5>
                                                    <div class="theme-settings-swatches">
                                                        <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light">
                                                        </div>
                                                        <div class="divider">
                                                        </div>
                                                        <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark">
                                                        </div>
                                                        <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light">
                                                        </div>
                                                        <div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="themeoptions-heading">
                                            <div>Main Content Options</div>
                                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                                            </button>
                                        </h3>
                                        <div class="p-3">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h5 class="pb-2">Page Section Tabs
                                                    </h5>
                                                    <div class="theme-settings-swatches">
                                                        <div role="group" class="mt-2 btn-group">
                                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                                                Line
                                                            </button>
                                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                                                Shadow
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- End of Color Settings -->
                    <!-- Main Content Starts from Here -->
                        <div class="app-main">
                                <div class="app-sidebar sidebar-shadow">
                                    <div class="app-header__logo">
                                        <div class="logo-src"></div>
                                        <div class="header__pane ml-auto">
                                            <!-- Sidebar Controller Icon -->
                                                <div>
                                                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                                        <span class="hamburger-box">
                                                            <span class="hamburger-inner"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            <!-- End of Sidebar controller icon -->
                                        </div>
                                    </div>
                                    <div class="app-header__mobile-menu">
                                        <div>
                                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                                <span class="hamburger-box">
                                                    <span class="hamburger-inner"></span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="app-header__menu">
                                        <span>
                                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                                <span class="btn-icon-wrapper">
                                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                                </span>
                                            </button>
                                        </span>
                                    </div>    
                                    
                                    <!-- sidebar -->
                                        <?php
                                            include_once 'sidebar.php';
                                        ?>
                                    <!-- /sidebar -->
                                </div>    
                                <div class="app-main__outer">
                                    <div class="app-main__inner">
                                        <!-- Page title wrapper -->
                                        <?php include_once 'pageTitle.php'; ?>
                                        <!-- End of Page title wrapper-->

                                        <!-- The Major content that is associated with index page starts from this place -->
                                        <div id="maincontent">

                                        <?php 

                                            $limit = 5;
                                            $page = 1;

                                            function page(){
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

                                            function pages(){
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

                                            function previous(){
                                                global $pages;
                                                if($pages <=5){
                                                    return 5;
                                                }else{
                                                    return $pages - 5;
                                                }
                                            }
                                            $Previous = previous();

                                            function nextArrow(){

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

                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <div class="row" id="update">
                                                            
                                                        </div>    
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <div class="row">
                                                            <?php $result =" "; function result($result){ echo $result; } ?>
                                                        </div>    
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                </div>

                                                <?php 
                                                    require_once ('book_class.php');

                                                    if(isset($_POST['addNewBook']))
                                                    {
                                                        if (isset($_FILES['book_cover']) && isset($_FILES['book_pdf']))
                                                        {  
                                                            $title = $_POST['title'];
                                                            $page_count = $_POST['pages'];
                                                            $details = $_POST['details'];
                                                            $volume = $_POST['volume'];
                                                            $price = $_POST['price'];

                                                            $name = strtolower($_FILES['book_cover']['name']);
                                                            $splitted = explode(".", $name);
                                                            $ext = end($splitted);
                                                            $path = "../images/books/".$title.".".$ext;

                                                            $pdf = strtolower($_FILES['book_pdf']['name']);
                                                            $splitted2 = explode(".", $pdf);
                                                            $ext2 = end($splitted2);
                                                            $path2 = "../books/".$title.".".$ext2;
                                                            

                                                            $passport_obj = new Passport($name, $ext, $path, $pdf, $ext2, $path2, $title, $page_count, $details, $price, $volume);
                                                            $passport_obj->Upload();
                                                        }
                                                    }

                                                ?>

                                            <?php include_once 'bookscontent.php'; ?>
                                        </div>
                                        <!-- End of the the main content that is associated with the index page -->
                                    </div>
                                </div>
                                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                                <div class="modal fade bd-example-modal-lg mt-2" id="addBook" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false" aria-hidden="true">
                                    <div class="modal-dialog modal-lg mt-5 mb-5">
                                        <div class="modal-content">
                                        <div class="modal-header text-info">
                                            <h5 class="modal-title">
                                                Add new Book
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="title">Book Title</label>
                                                        <input type="text" name="title" class="form-control" id="title">
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
                                                        <input type="number" name="price" class="form-control" id="price">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="book_pdf">
                                                            Upload the pdf
                                                        </label>
                                                        <input type="file" class="form-control" id="book_pdf" name="book_pdf">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="book_cover">
                                                            Book back cover
                                                        </label>
                                                        <input type="file" class="form-control" id="book_cover" name="book_cover">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="details">Description</label>
                                                        <textarea type="text" class="form-control fr-view" name="details" id="details">
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" name="addNewBook" value="addNewBook" class="btn btn-primary block btm-sm">Save Book</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <!-- /Main Content Ends here -->

                    <!-- Warning Modal before deleting a contact message -->
                    <div class="modal fade bd-example-modal-lg mt-5" id="removeBookModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header text-danger">
                                <h5 class="modal-title">
                                    Warning <i class="icon fa pe-7s-attention"></i> 
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="position-relative">
                                    <p>
                                        <h6 class="text-center">You are about to remove this Book from the Library Shelf</h6>
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="mr-5 btn-transition btn btn-outline-success" data-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" id="" name="" value="" onclick="removeBook(this.id)" class="mr-5 btn-transition btn btn-outline-danger finalDelete" data-dismiss="modal">
                                    Yes, Proceed
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Warning Modal before deleting a contact message -->
                </div>
                <script type="text/javascript" src="../assets/bootstrap-4.4.1-dist/js/jquery.js"></script>
                <script type="text/javascript" src="../assets/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
                <script type="text/javascript" src="../assets/fontawesomeForWeb/js/all.js"></script>
                <script type="text/javascript" src="../assets/forala/js/froala_editor.pkgd.min.js"></script>
                <script type="text/javascript" src="./assets/scripts/main.js"></script>
                <script type="text/javascript" src="../ajax_class.js"></script>
                <script>
                    var forala = new FroalaEditor('textarea');

                    function removeElement(id)
                    {
                        var element = document.getElementById(id);
                        element.parentNode.removeChild(element);
                    }

                    $(document).ready(function (){

                        // $('.flash_msg').delay(250).fadeOut('slow');

                        $('.editPrice').click(function (){
                            var name = $(this).attr("name");
                            var id = $(this).attr("id");
                            var price = $(this).attr("value");

                            document.getElementById("bookName").innerHTML = name;
                            document.getElementById("oldPrice").innerHTML = price;
                            $('.saveNewPrice').attr("id", id);


                            $('#newPrice').modal('show');
                        });

                        $('.saveNewPrice').click(function (){
                            var book_id = $(this).attr("id");
                            var newPrice = document.getElementById("newPriceSet").value;
                            XmlHttp
                            (
                                {
                                    url: 'testing.php',
                                    type: 'POST',
                                    data: "editBookPrice="+book_id+"&newPrice="+newPrice,
                                    complete:function(xhr,response,status)
                                    {
                                        if(response != "")
                                        {
                                            document.getElementById('update').innerHTML = response;
                                        }
                                        else{
                                            var errorMsg =  '<div class="col-sm-12 alert alert-danger alert-dismissable">'+
                                                                '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                                                '<h6><i class="icon fa pe-7s-attention"></i> Unable to delete, please try again later</h6>'+
                                                            '</div>';

                                            document.getElementById('update').innerHTML = errorMsg;
                                        }
                                    }
                                }
                            ); 
                        });

                        $('.removeBook').click(function (){
                            var book_id = this.id;
                            var name = this.name;
                            var value = this.value;

                            $('.finalDelete').attr("id", book_id);
                            $('.finalDelete').attr("name", name);
                            $('.finalDelete').attr("value", value);

                            $('#removeBookModal').modal('show');
                        });

                        $('.finalDelete').click(function (){
                            var delete_id = $(this).attr("id");
                            var delete_name = $(this).attr("name");
                            var delete_value = $(this).attr("value");

                            var extensions = delete_value.split(".");
                            var ext = extensions[0];
                            var ext2 = extensions[1];

                            function removeBook(a, b, c, d)
                            {
                                XmlHttp
                                (
                                    {
                                        url: 'testing.php',
                                        type: 'POST',
                                        data: "removeBook="+a+"&name="+b+"&ext="+c+"&ext2="+d,
                                        complete:function(xhr,response,status)
                                        {
                                            if(response != ""){
                                                document.getElementById('update').innerHTML = response;

                                                removeElement(a);
                                            }else{
                                                var errorMsg =  '<div class="col-sm-12 alert alert-danger alert-dismissable">'+
                                                                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                                                    '<h6><i class="icon fa pe-7s-attention"></i> Unable to delete, please try again later</h6>'+
                                                                '</div>';

                                                document.getElementById('update').innerHTML = errorMsg;
                                            }
                                        }
                                    }
                                );
                            }

                            removeBook(delete_id, delete_name, ext, ext2);
                        });

                    });
                </script>
                </body>
            </html>


            <!-- the main page ends here -->
        <?php
        }
        else{
            header("Location: index.php");
        }
    }
    else{
            header("Location: index.php");
    }
?>