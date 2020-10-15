<?php

    session_start();

    if(isset($_POST['submitRemove']) && $_POST['submitRemove'] === "submitRemove")
    {
        if(isset($_SESSION['username_frontEnd']))
        {   
            $romeveBook_id = $_POST['removeBookFromCart'];
            $keyOfElementToRemove = array_search($removeBook_id, $_SESSION['shoppingCart']);
            unset($_SESSION['shoppingCart'][$keyOfElementToRemove]);
            $_SESSION['shoppingCart'] = array_values($_SESSION['shoppingCart']);
        } 
    }

    if(isset($_SESSION['username_frontEnd']))
    {
        if(isset($_SESSION['shoppingCart']) && !empty($_SESSION['shoppingCart']))
        {
            include_once 'life/php/db.php';

            $conn = get_DB();
            $book_id = $_SESSION['shoppingCart'];
            $userName = $_SESSION['username_frontEnd'];

            $sql_userDetails =  "
                                    SELECT * FROM users WHERE username = :userName
                                ";

            $stmt1 = $conn->prepare($sql_userDetails);
            $stmt1->bindValue(':userName', $userName);
            $userResources = $stmt1->execute();

            $userDetails = $stmt1->fetch();
            
            include_once 'header/header2.php';
            include_once 'life/php/indexpage.php';
        ?>
           <style>
                #pay a{
                    width: 30%; 
                    background-color: white; 
                    border: 2px solid #449D44;
                }
                #pay a:hover{
                    background-color: #DFF0D8;
                }
           </style>
            <div class="subpage-head" style="margin-bottom: 10px;">
                <div class="container">
                    <h4 class="text-center">Make Payment</h4>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-xs-12 px-auto">
                        <h6 Class="bg-success text-center" style="padding: 10px;">Books in your shopping Cart</h6>
                        <div class="col-xs-12 pull-center">

                            <!-- Shopping Cart Details -->
                            <?php
                                for($i = 0; $i<COUNT($book_id); ++$i)
                                {
                                    $sql_book = "
                                                    SELECT * FROM books WHERE book_id = :book_id
                                                ";

                                    $stmt = $conn->prepare($sql_book);
                                    $stmt->bindParam(':book_id', $book_id[$i]);
                                    $stmt->execute();
                                    $bookDetails = $stmt->fetch();
                            ?>  
                                    <div class="row" style="margin-bottom: 10px;" id="<?= $bookDetails['book_id']; ?>">
                                        <div class="col-xs-4 col-md-2 text-center">
                                            <img class="img-responsive" src="images/books/<?= $bookDetails['book_title'];?>.<?= $bookDetails['ext'];?>" style="height: 150px; width: 100%;" alt="">
                                        </div>
                                        <div class="col-xs-8 col-md-10">
                                            <div class="row">
                                                <div class="col-xs-12 well" id="height" style="margin-right: 10px;">
                                                    <p><strong><?= $bookDetails['book_title'];?></strong></p>
                                                    <p>Price: <span><?= $bookDetails['price'];?></span></p>
                                                    <p>
                                                        <form method="POST">
                                                            <input type="text" name="removeBookFromCart" value="<?= $books['book_id']; ?>" hidden>
                                                            <button type="submit" class="btn btn-danger btn-xs" name="submitRemove" value="submitRemove">
                                                                Remove from cart
                                                            </button>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php 
                                }
                            ?>
                            <!-- /Shopping Cart Details -->

                            <div class="row" id="pay">
                                <div class="col-12" style="font-size: 1.0em;">
                                    <h6 Class="bg-success text-center" style="padding: 10px;">Summary</h6>
                                    <p class="text-center"><strong> Number of Items: <span><?= COUNT($book_id); ?></span></strong></p>
                                    <p class="text-center"><strong>Total: <span>
                                        <?php
                                            $total = 0;
                                            for($i = 0; $i<COUNT($book_id); ++$i)
                                            {
                                                $sql_book = "
                                                    SELECT * FROM books WHERE book_id = :book_id
                                                ";

                                                $stmt = $conn->prepare($sql_book);
                                                $stmt->bindParam(':book_id', $book_id[$i]);
                                                $stmt->execute();
                                                $bookDetails = $stmt->fetch();

                                                $total += $bookDetails['price'];
                                            };
                                            echo $total;
                                        ?>
                                    </span></strong></p>
                                    <p class="text-center"><a class="btn text-center" value="<?= $total; ?>" role="button">Pay</a></p>
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

        </body>
        </html>
<?php
        }
        else{
            header('Location: books.php');
        }
    }
    else{
        header('Location: books.php');
    }
?>

    