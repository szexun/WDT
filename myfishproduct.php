<?php
    include('navbar.php');
    include('db.php');

    // start the session if it is not set
    if(!isset($_SESSION)){
        session_start();
    }
    // get the user's id from the URL
    $id = $_SESSION['id'];
    // sql query to retrieve fish's data from database based on user's id
    $query = "SELECT * FROM `fish` WHERE user_id = '$id'";
    // store the sql query result in a variable
    $result = mysqli_query($conn, $query);
    
    // declare array variables
    $fish_id = array();
    $fish_picture = array();
    $fish_name = array();
    $fish_description = array();
    $fish_price = array();
    $seller_contact = array();

    // return all the row of data as an associative until finish
    while($data = mysqli_fetch_assoc($result)){
        // add the data into array that we declared before
        array_push($fish_id, $data['fishID']);
        array_push($fish_name, $data['fish_name']);
        array_push($fish_description, $data['fish_description']);
        array_push($fish_price, $data['fish_price']);
        array_push($fish_picture, $data['fish_picture']);
        array_push($seller_contact, $data['seller_contact']);
    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/myproduct.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Main Page</title>
</head>

<body> 
    <h1><center>My Fish Product</center><br></h1>
    <?php for($i = 0 ; $i < sizeof($fish_name) ; $i++){ // if it is lesser than the length of fish_name ?>

    <div class="card column" style="width: 18rem;">
        <img src="<?php echo($fish_picture[$i])?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo($fish_name[$i]);?></h5>
            <p class="card-text"><?php echo("RM " . $fish_price[$i]);?></p>
            <a href="editfishproduct.php?id=<?php echo($fish_id[$i])?>" class="btn btn-primary">Edit Product</a>
            <a href="deletefishproduct.php?id=<?php echo($fish_id[$i])?>" class="btn btn-danger">Delete Product</a>
        </div>
    </div>
    <?php  } ?>
</body>
</html>