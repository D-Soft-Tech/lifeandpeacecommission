<?php

$book_titles = $conn->query("SELECT book_title FROM books");
$book_titles = $book_titles->fetchAll();

$first_quarter = array("January", "February", "March", "April", "May", "June");
$second_quarter = array("July", "August", "September", "October", "November", "December");

if(isset($_POST['submitSearchBooksSalesReport']) && isset($_POST['month']) && isset($_POST['year']) && !empty($_POST['month']) && !empty($_POST['year']))
{
    if($_POST['month'] == 1)
    {
        $current_month = 'February';
    }
    else{
        $current_month = 'August';
    }

    $year = $_POST['year'];
}
else
{
    $current_month = date("F");

    $year = date("Y");
}

echo '[';
echo "'Month',";
for($bt=0; $bt<count($book_titles); ++$bt)
{
    echo "'".$book_titles[$bt]['book_title']."'";
    if($bt == count($book_titles) - 1)
    {
        continue;
    }
    echo ',';
}
echo '],';

if(in_array($current_month, $first_quarter))
{
    $month_one = reset($first_quarter);
    $book_sales_report = array();
    
    for($i = 0; $i < 6; ++$i)
    {
        echo '[';
        echo "'".$month_one. "',";
            for ($counter = 0; $counter < count($book_titles)  ; ++$counter)
            { 
                
                $book_sales_sql =   "
                                        SELECT books.book_title AS title, transactions.month AS month, 
                                        sum(transactions.amount) AS amount FROM books, 
                                        transactions WHERE transactions.purpose = 'books' 
                                        && transactions.month = :month && transactions.year = :year && 
                                        books.book_title = '".$book_titles[$counter]['book_title']."' &&
                                        transactions.purpose_id = books.book_id GROUP BY month, title
                                    "; 
            
                $stmt = $conn->prepare($book_sales_sql);
                
                $stmt->bindParam(':month', $month_one);
                $stmt->bindParam(':year', $year);
                
                $checker = $stmt->execute();
            
                $book_sales_report = $stmt->fetchAll();
            
                    if($book_sales_report === array())
                    {
                        echo 0;
                    }
                    else
                    {
                        echo $book_sales_report[0]['amount'];
                    }
            
                    if($counter == count($book_titles) - 1)
                    {
                        continue;
                    }
                    echo ',';
            }

        $month_one = next($first_quarter);

    
        echo ']';

        if($i === 5)
        {
            continue;
        }
        echo ',';
    }
}
else
{
    $month_one = reset($second_quarter);
    $book_sales_report = array();
    
    for($i = 0; $i < 6; ++$i)
    {
        echo '[';
        echo "'".$month_one. "',";
            for ($counter = 0; $counter < count($book_titles)  ; ++$counter)
            { 
                
                $book_sales_sql =   "
                                        SELECT books.book_title AS title, transactions.month AS month, 
                                        sum(transactions.amount) AS amount FROM books, 
                                        transactions WHERE transactions.purpose = 'books' 
                                        && transactions.month = :month && transactions.year = :year && 
                                        books.book_title = '".$book_titles[$counter]['book_title']."' &&
                                        transactions.purpose_id = books.book_id GROUP BY month, title                                    "; 
            
                $stmt = $conn->prepare($book_sales_sql);
                
                $stmt->bindParam(':month', $month_one);
                $stmt->bindParam(':year', $year);

                $checker = $stmt->execute();
            
                $book_sales_report = $stmt->fetchAll();
            
                    if($book_sales_report === array())
                    {
                        echo 0;
                    }
                    else
                    {
                        echo $book_sales_report[0]['amount'];
                    }
            
                    if($counter == count($book_titles) - 1)
                    {
                        continue;
                    }
                    echo ',';
            }

        $month_one = next($second_quarter);

    
        echo ']';

        if($i === 5)
        {
            continue;
        }
        echo ',';
    }
}
?>