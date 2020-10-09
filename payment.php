<?php
  require_once 'header/header.php';
  include_once 'life/php/db.php';
  include_once 'life/php/indexpage.php';
?>
    <style>
        @media (max-width:300px) {
            #height {
                height: 200px;
            }
            .image-responsive{
                height: 200px;
            }
        }
        @media (max-width: 500px){
            .image-responsive{
                height: 150px;
                width: 100px;
            }
            #height{
                height: 150px;
                width: 250px;
            }
        }
        @media (min-width: 550px){
            #height{
                max-height: 200px;
            }
        }

        #pay a{
            width: 30%; 
            background-color: white; 
            border: 2px solid #449D44;
        }
        #pay a:hover{
            background-color: #DFF0D8;
        }
    </style>
    <div class="subpage-head has-margin-bottom">
        <div class="container">
            <h4 class="text-center">Make Payment</h4>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-12 px-auto">
                <h6 Class="bg-success text-center" style="padding: 10px;">Books in your shopping Cart</h6>
                <div class="col-xs-12 has-margin-bottom pull-center">

                    <!-- Shopping Cart Details -->
                    <div class="row">
                        <div class="col-xs-3 col-sm-2 has-margin-bottom" style="margin-bottom: 10px;">
                            <img src="images/books/book5.jpg" style="max-height: 200px;" alt="" class="image-responsive">
                        </div>
                        <div class="col-xs-9 col-sm-10" style="padding:auto; padding-right: 30px;" style="margin-bottom: 10px;">
                            <div class="row">
                                <div class="col-xs-12 well image-responsive" id="height" style="margin-left: 20px; line-height: 2.0; margin-right: 10px;">
                                    <p><strong>Wonders of Jesus</strong></p>
                                    <p>Price<span></span></p>
                                    <p><a class="btn btn-success btn-xs" role="button">remove from cart</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-2 has-margin-bottom" style="margin-bottom: 10px;">
                            <img src="images/books/book5.jpg" style="max-height: 200px;" alt="" class="image-responsive">
                        </div>
                        <div class="col-xs-9 col-sm-10" style="padding:auto; padding-right: 30px;" style="margin-bottom: 10px;">
                            <div class="row">
                                <div class="col-xs-12 well image-responsive" id="height" style="margin-left: 20px; line-height: 2.0; margin-right: 10px;">
                                    <p><strong>Wonders of Jesus</strong></p>
                                    <p>Price<span></span></p>
                                    <p><a class="btn btn-success btn-xs" role="button">remove from cart</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Shopping Cart Details -->

                    <div class="row" id="pay">
                        <div class="col-12" style="font-size: 1.0em;">
                            <h6 Class="bg-success text-center" style="padding: 10px;">Summary</h6>
                            <p class="text-center"><strong> Number of Items: <span></span></strong></p>
                            <p class="text-center"><strong>Total: <span>#5,000</span></strong></p>
                            <p class="text-center"><a class="btn text-center" role="button">Pay</a></p>
                        </div>
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

<?php
include_once 'backend/php/db.php';
?>

</body>
</html>