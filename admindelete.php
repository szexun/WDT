<?php
    include('db.php');

    // get the user's id from the URL
    $id = $_GET['id'];
    // sql query to delete user's data from database based on user's id
    $sql_query = "DELETE FROM `users` WHERE id='$id'";
    // if sql query is executed successfully
    if(mysqli_query($conn, $sql_query)){
        echo "Deleted";
    } else {
        echo "Delete Failed.";
    }
    header('location: admin.php');
?>