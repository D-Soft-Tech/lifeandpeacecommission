<?php
    include_once 'php/db.php';
    $conn = get_DB();

    // this echos back the total number of new comments on articls or quotes
    if($_POST['item'] === 'articles' OR $_POST['item'] === 'quote')
    {   
        $item = $_POST['item'];
        
        $item_id = $item."_id";
        $sql = "
                    SELECT * FROM $item, comments WHERE comments.obj = '$item' && 
                    $item.$item_id = comments.obj_id && comments.status = 'pending'
                ";

        $articleResource = $conn->prepare($sql);

        $articleResource->execute();

        $articles = $articleResource->fetchAll();
        $total = count($articles);

        echo $total;
        exit();
    }
    elseif($_POST['item'] === 'contacts' OR $_POST['item'] === 'testimonies')
    {
        $item = $_POST['item'];

        $sql = "
                    SELECT * FROM $item WHERE status = 'pending'; 
                ";
        $contactResource = $conn->prepare($sql);
        $contactResource->execute();

        $contact = $contactResource->fetchAll();
        echo count($contact);
        exit();
    }
    elseif($_POST['item'] === 'readContacts'){

        $item = 'contacts';

        $sql = "
                    SELECT * FROM $item WHERE status = 'read'; 
                ";
        $contactResource = $conn->prepare($sql);
        $contactResource->execute();

        $contact = $contactResource->fetchAll();
        echo count($contact);
        exit(); 
    }
    elseif($_POST['item'] === 'allowedTesti')
    {
        $item = $_POST['item'];

        $sql = "
                    SELECT * FROM testimonies WHERE status = 'read'; 
                ";
        $contactResource = $conn->prepare($sql);
        $contactResource->execute();

        $contact = $contactResource->fetchAll();
        echo count($contact);
        exit();
    }

?>