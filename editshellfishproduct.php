<?php
    include('navbar.php');
    include('db.php');

    // get the shellfish's id from the URL
    $id = $_GET['id'];
    // sql query to retrieve shellfish data from the database based on shellfish's id
    $sql_query = "SELECT * FROM shellfish WHERE shellfishID = '$id'";
    // store the result of sql query into a variable
    $result = mysqli_query($conn, $sql_query);
     // return the row of result as an associative array
    $row = mysqli_fetch_assoc($result);

     // if submit button is clicked
    if(isset($_POST['updateProduct'])){
        // get the value from the form and store into a variable
        $shellfish_name = $_POST['txtShellFishName']; 
        $shellfish_price = $_POST['txtPrice'];
        $shellfish_description = $_POST['txtDescription'];
        $shellfish_picture = $_POST['txtPicture'];
        $user_id = $row['user_id'];
        $seller_contact = $_POST['txtContact'];
        // sql query to update information in database
        $query = "UPDATE `shellfish` SET `shellfish_name`='$shellfish_name',`shellfish_description`='$shellfish_description',`shellfish_price`='$shellfish_price',`shellfish_picture`='$shellfish_picture',`user_id`='$user_id',`seller_contact`='$seller_contact' WHERE shellfishID = '$id'";
        
        // if sql query is executed successfully
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Update Successfully!')</script>";
            echo "<script>history.go(-2)</script>";
        } else {
            echo "<script>alert('Update Failed!')</script>";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/manage.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Shell Fish Product</title>
</head>

<body>
    <div>
        <h1>Edit Shell Fish Product</h1>
    </div>
    <div class="container">
        <div class="col-md-6">
            <label for="" class="form-label">Shell Fish ID: </label> <?php echo $row['shellfishID']?>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label" name="txtUserID">User ID: </label> <?php echo $row['user_id']?>
        </div>
        <form class="row g-3" action="" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Shell Fish Name</label>
                <input type="text" class="form-control" name="txtShellFishName" value="<?php echo $row['shellfish_name']?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Shell Fish Price</label>
                <input type="text" class="form-control" name="txtPrice" value="<?php echo $row['shellfish_price']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Shell Fish Description</label>
                <input type="text" class="form-control" name="txtDescription" value="<?php echo $row['shellfish_description']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Shell Fish Picture(URL)</label>
                <input type="text" class="form-control" name="txtPicture" value="<?php echo $row['shellfish_picture']?>">
                <img src="<?php echo $row['shellfish_picture']?>" height="75px" width="75px" alt="">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Seller Contact</label>
                <input type="text" class="form-control" name="txtContact" value="<?php echo $row['seller_contact']?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="updateProduct">Update Product</button>
            </div>
        </form>
    </div>
    <footer class="footer_section">
        <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
            <div class="footer_contact">
                <h4>
                Contact Us
                </h4>
                <div class="contact_link_box">
                <a>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                    Call +0123456789
                    </span>
                </a>
                <a>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                    admin@gmail.com
                    </span>
                </a>
                </div>
            </div>
            </div>
            <div class="col-md-4 footer-col">
            <div class="footer_detail">
                <a class="footer-logo">
                Saltic
                </a>
                <p>
                No-One does seafood like Saltic ~
                </p>
            </div>
            </div>
            <div class="col-md-4 footer-col">
            <h4>
                Opening Hours
            </h4>
            <p>
                Everyday
            </p>
            <p>
                24 Hours
            </p>
            </div>
        </div>
        <div class="footer-info">
            <p>
            &copy; <span id="displayYear"></span> All Rights Reserved By
            <a>APU Web Solution Sdn.Bhd.</a><br><br>
            &copy; <span id="displayYear"></span> Distributed By
            <a>Saltic Sdn.Bhd.</a>
            </p>
        </div>
        </div>
    </footer>
</body>
</html>