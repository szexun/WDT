<?php
    include('db.php');

    // sql query to retrieve all the data from fish table
    $sql_query1 = "SELECT * FROM `fish`";
    // store the result of sql query into a variable
    $result = mysqli_query($conn, $sql_query1);
    
    // $row = mysqli_fetch_assoc($result);
    // echo $row['productID'];
    // echo $row['product_name'];
    // echo $row['product_description'];
    // echo $row['product_details'];
    // echo $row['product_price'];

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

    <link rel="stylesheet" href="css/product.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Main Page</title>
</head>

<body>
    <?php include('navbar.php');?>  
    <h1><center>Fish</center><br></h1>
    <?php for($i = 0 ; $i < sizeof($fish_name) ; $i++){ // if it is lesser than the length of fish_name ?>

    <div class="card column" style="width: 18rem;">
        <img src="<?php echo($fish_picture[$i])?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo($fish_name[$i]);?></h5>
            <p class="card-text"><?php echo("RM " . $fish_price[$i]);?></p>
            <a href="viewFishDetails.php?id=<?php echo($fish_id[$i])?>" class="btn btn-primary">Check Details</a>
        </div>
    </div>
    <?php  } ?>
</body>
</html>