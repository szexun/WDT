<?php
    include('db.php');
    include('navbar.php');

    // get the fish's id from the URL
    $id = $_GET['id'];
    // create select sql
    $sql_query = "SELECT * FROM fish WHERE fishID='$id'";
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
</head>

<body>
    <center>
    <div class="card" style="width: 25rem;">
        <img src="<?php echo $row['fish_picture']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h1><?php echo $row['fish_name']?></h1>
            <p class="card-text">
                <?php echo $row['fish_description']. "<br><br>"?>
                <?php echo "Price: <br> RM " . $row['fish_price']. "<br><br>"?>
                <?php echo "Seller Contact: <br>" . $row['seller_contact']?>
            </p>
        </div>
    </div>
    </center>
</body>

</html>

