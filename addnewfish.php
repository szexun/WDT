<?php
    include('navbar.php');
    include('db.php');

    // start session if session hasn't set 
    if(!isset($_SESSION)){
        session_start();
    }
    
    // get the user's id from the session id
    $user_id = $_SESSION['id'];

    // if submit button is clicked
    if(isset($_POST['addFish'])){
        // get the value from the form and store in a variable respectively
        $fishName = $_POST['txtFishName'];
        $fishDescription = $_POST['txtDescription'];
        $fishPrice = $_POST['txtPrice'];
        $fishPicture = $_POST['txtPicture'];
        $sellerContact = $_POST['txtSellerContact'];

        // query to insert data into database
        $sql_query = "INSERT INTO `fish`(`fish_name`, `fish_description`, `fish_price`, `fish_picture`,`user_id`, `seller_contact`) 
        VALUES ('$fishName','$fishDescription','$fishPrice','$fishPicture', '$user_id','$sellerContact')";

        // if sql query is executed successfully
        if(mysqli_query($conn,  $sql_query)){
            echo "<script>alert('Add Successfully')</script>";
            echo "<script> window.location.href='fish.php';</script>";
        } else {
            echo "Add Failed.";
        }
    } 
    
    // get the user's id from the session id
    $id = $_SESSION['id'];
    // query to read find the user with the specific user id
    $query = "SELECT * FROM users WHERE id = '$id'";
    // store the result of sql statement into a variable
    $result = mysqli_query($conn, $query);
    // fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<body>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/manage.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <body>
    <h1>Add New Fish</h1>
    <div class="container">
        <form class="row g-3" action="" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Fish Name:</label>
                <input type="text" class="form-control" name="txtFishName" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Fish Description:</label>
                <input type="text" class="form-control" name="txtDescription" required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Price</label>
                <input type="text" class="form-control" name="txtPrice" required>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Picture(URL)</label>
                <input type="text" class="form-control" name="txtPicture" required>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Seller Contact</label>
                <input type="text" class="form-control" name="txtSellerContact" value="<?php echo $row['contact_number'];?>" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="addFish">Add Fish</button>
            </div>
        </form>
    </div>
    </body>
</html>