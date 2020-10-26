<?php

    session_start();

    include_once 'php/db.php';

    $conn = get_DB();

    if(isset($_POST['refCode']) && !empty($_POST['refCode']) && $_POST['refCode'] === $_SESSION['refCode'])
    {
        $sql_uId =  "
                        SELECT user_id FROM users WHERE username = :userName
                    ";

        $stmta = $conn->prepare($sql_uId);
        $stmta->bindValue(':userName', $_SESSION['username_frontEnd']);
        $stmta->execute();

        $user_id = $stmta->fetch();

        $user_id = $user_id['user_id'];

        date_default_timezone_set ('Africa/lagos');
        $time = date("h:i a");

        for($i = 0; $i<COUNT($_SESSION['shoppingCart']); ++$i)
        {
            $sql_book1 = "
                            SELECT book_title, price FROM books WHERE book_id = :book_id
                        ";

            $dayNumber = date("jS"); 
            $day = $dayNumber . " of ";
            $month = date("F"); 
            $year = date("Y");

            $stmt = $conn->prepare($sql_book1);
            $stmt->bindParam(':book_id', $_SESSION['shoppingCart'][$i]);
            $stmt->execute();
            $bookDetails = $stmt->fetch();

            $booktTitle = $bookDetails['book_title'];
            $bookPrice = $bookDetails['price'];

            $details = '#'. $bookPrice. ' for '. $booktTitle;

            $sql_book = "
                            INSERT INTO transactions (user_id, purpose, purpose_id, reference, details, transc_time, day, month, year, amount)
                            VALUES(:user_id, 'books', :purpose_id, :reference, :details, :transc_time, :day, :month, :year, :amount)
                        ";

            $stmt = $conn->prepare($sql_book);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':purpose_id', $_SESSION['shoppingCart'][$i]);
            $stmt->bindParam(':reference', $_POST['refCode']);
            $stmt->bindParam(':details', $details);
            $stmt->bindParam(':transc_time', $time);
            $stmt->bindParam(':day', $day);
            $stmt->bindParam(':month', $month);
            $stmt->bindParam(':amount', $bookPrice);
            $stmt->bindParam(':year', $year);
            $checker = $stmt->execute();

            if($checker === true)
            {
                $counter = 1 + $i;
            }
        }
        if($counter === COUNT($_SESSION['shoppingCart']))
        {
            // unset($_SESSION['shoppingCart']);
            echo    '<div class="alert alert-success alert-dismissable mt-2" style="margin-right: 10%; margin-top: 10px; margin-bottom: 0px; margin-left: 10%;">'.
                        '<div class="">'.
                            '<p><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp; Payment successfull, click the link below to download your books'.
                                '<br> <a class="btn-link" href="download.php?refCode='.$_POST['refCode'].'">Download Books </a>'.
                            '</p>'.
                        '</div>'.
                    '</div>';
        }
        else{ unset($_SESSION['shoppingCart']); }
    }
?>