<?php
    include('db.php');
    include('navbar.php');

    // get the combo set's id from the URL
    $id = $_GET['id'];
    // create select sql 
    $sql_query = "SELECT * FROM comboset WHERE combosetID='$id'";
    $result = mysqli_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/productdetails.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Main Page</title>
</head>

<body>
    <center>
    <div class="card column" style="width: 18rem;">
        <img src="<?php echo $row['picture1']?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo $row['item1']?></h5>
        </div>
        <img src="<?php echo $row['picture2']?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo $row['item2']?></h5>
        </div>
        <img src="<?php echo $row['picture3']?>" height="175" width="25" class="card-img-top" alt="">
        <div class="card-body justify-content-center">
            <h5 class="card-title"><?php echo $row['item3']?></h5>
        </div>
        <div class="card-body justify-content-center">
            <p class="card-text"><?php echo "Price: <br> RM " . $row['combo_price'];?></p>
            <p class="card-text"><?php echo "Seller Contact: <br>" . $row['seller_contact'];?></p>
        </div>
    </div>
    </center>
    
</body>
</html>