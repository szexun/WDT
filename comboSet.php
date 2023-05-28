<?php
    include('db.php');

    // sql query to retrieve all the data from comboset table
    $sql_query1 = "SELECT * FROM `comboset`";
    // store the result of sql query into a variable
    $result = mysqli_query($conn, $sql_query1);
    
    // $row = mysqli_fetch_assoc($result);
    // echo $row['productID'];
    // echo $row['product_name'];
    // echo $row['product_description'];
    // echo $row['product_details'];
    // echo $row['product_price'];

    // declare array variables
    $comboset_id = array();
    $item1 = array();
    $picture1 = array();
    $item2 = array();
    $picture2 = array();
    $item3 = array();
    $picture3 = array();
    $combo_price = array();

    // return all the row of data as an associative until finish
    while($data = mysqli_fetch_assoc($result)){
        // add the data into array that we declared before
        array_push($comboset_id, $data['combosetID']);
        array_push($item1, $data['item1']);
        array_push($picture1, $data['picture1']);
        array_push($item2, $data['item2']);
        array_push($picture2, $data['picture2']);
        array_push($item3, $data['item1']);
        array_push($picture3, $data['picture3']);
        array_push($combo_price, $data['combo_price']);
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
    <h1><center>Combo Set</center><br></h1>
    <?php for($i = 0 ; $i < sizeof($comboset_id) ; $i++){ // if it is lesser than the length of comboset_id ?>

    <div class="card column" style="width: 18rem;">
        <img src="<?php echo($picture1[$i])?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo($item1[$i]);?></h5>
        </div>
        <img src="<?php echo($picture2[$i])?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo($item2[$i]);?></h5>
        </div>
        <img src="<?php echo($picture3[$i])?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo($item3[$i]);?></h5>
        </div>
        <div class="card-body justify-content-center">
            <p class="card-text"><?php echo("RM " . $combo_price[$i]);?></p>
            <a href="viewCombosetDetails.php?id=<?php echo($comboset_id[$i])?>" class="btn btn-primary">Check Details</a>
        </div>
    </div>
    <?php  } ?>
</body>
</html>