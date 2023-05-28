<?php
    include('navbar.php');
    include('db.php');

    // start the session if it is not set
    if(!isset($_SESSION)){
        session_start();
    }
    // get the user's id from the URL
    $id = $_SESSION['id'];
    // sql query to retrieve shellfish's data from database based on user's id
    $query = "SELECT * FROM `shellfish` WHERE user_id = '$id'";
    // store the sql query result in a variable
    $result = mysqli_query($conn, $query);
    
    // declare array variables
    $shellfish_id = array();
    $shellfish_picture = array();
    $shellfish_name = array();
    $shellfish_description = array();
    $shellfish_price = array();
    $seller_contact = array();

    // return all the row of data as an associative until finish
    while($data = mysqli_fetch_assoc($result)){
        // add the data into array that we declared before
        array_push($shellfish_id, $data['shellfishID']);
        array_push($shellfish_name, $data['shellfish_name']);
        array_push($shellfish_description, $data['shellfish_description']);
        array_push($shellfish_price, $data['shellfish_price']);
        array_push($shellfish_picture, $data['shellfish_picture']);
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
    <h1><center>My Shell Fish Product</center><br></h1>
    <?php for($i = 0 ; $i < sizeof($shellfish_name) ; $i++){ // if it is lesser than the length of shellfish_name?>

    <div class="card column" style="width: 18rem;">
        <img src="<?php echo($shellfish_picture[$i])?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo($shellfish_name[$i]);?></h5>
            <p class="card-text"><?php echo("RM " . $shellfish_price[$i]);?></p>
            <a href="editshellfishproduct.php?id=<?php echo($shellfish_id[$i])?>" class="btn btn-primary">Edit Product</a>
            <a href="deleteshellfishproduct.php?id=<?php echo($shellfish_id[$i])?>" class="btn btn-danger">Delete Product</a>
        </div>
    </div>
    <?php  } ?>
</body>
</html>