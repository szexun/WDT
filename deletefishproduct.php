<?php
    include('db.php');

    // get the user's id from the URL
    $id = $_GET['id'];
    // sql query to delete fish's data from database based on user's id
    $sql_query = "DELETE FROM `fish` WHERE fishID='$id'";
    // if sql query is executed successfully
    if(mysqli_query($conn, $sql_query)){
        echo "<script>alert('Deleted')</script>";
        echo "<script>history.go(-1)</script>";
    } else {
        echo "<script>alert('Delete Failed')</script>";
    }
?>