<?php
    require_once 'php/db.php';

    $conn = get_DB();
    session_start();


    function disabledButton()
    {
        if(!isset($_SESSION['permission']) OR $_SESSION['permission'] != true){
            echo "disabled";
        }
    }

    if(isset('logout')){
        header('Location: index.php');
    }

?>