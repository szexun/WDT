<?php
    include('navbar.php');
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['username'])){
        if($_SESSION['role'] == 0){
            header('location: mainpage.php');
        } else { 
            header('location: mainpage.php');
        }
    } else {
        header('location: mainpage.php');
    }
?>



