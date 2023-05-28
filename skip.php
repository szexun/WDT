<?php
    // start the session
    session_start();
    //unset ALL session used
    unset($_SESSION['username']);
    unset($_SESSION['role']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    echo header('location: index.php');
?>