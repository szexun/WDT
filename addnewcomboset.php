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
    if(isset($_POST['addCombo'])){
        // get the value from the form and store in a variable respectively
        $item1 = $_POST['txtItem1'];
        $picture1 = $_POST['txtPicture1'];
        $item2 = $_POST['txtItem2'];
        $picture2 = $_POST['txtPicture2'];
        $item3 = $_POST['txtItem3'];
        $picture3 = $_POST['txtPicture3'];
        $combo_price = $_POST['txtPrice'];
        $sellerContact = $_POST['txtSellerContact'];
        // query to insert data into database
        $sql_query = "INSERT INTO `comboset`(`item1`, `item2`, `item3`, `combo_price`, `user_id`,`seller_contact`, `picture1`, `picture2`, `picture3`) 
        VALUES ('$item1','$item2','$item3','$combo_price', '$user_id','$sellerContact','$picture1','$picture2','$picture3')";
        
        // if sql query is executed successfully
        if(mysqli_query($conn,  $sql_query)){
            echo "<script>alert('Add Successfully')</script>";
            echo "<script> window.location.href='comboset.php';</script>";
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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/footer.css" rel="stylesheet">
    <link href="css/manage.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <h1>Add New Combo Set</h1>
    </div>
    <div class="container">
        <form class="row g-3" action="" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">item1:</label>
                <input type="text" class="form-control" name="txtItem1" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">picture1(URL):</label>
                <input type="text" class="form-control" name="txtPicture1" required>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">item2:</label>
                <input type="text" class="form-control" name="txtItem2" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">picture2(URL):</label>
                <input type="text" class="form-control" name="txtPicture2" required>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">item3:</label>
                <input type="text" class="form-control" name="txtItem3" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">picture3(URL):</label>
                <input type="text" class="form-control" name="txtPicture3" required>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Price</label>
                <input type="text" class="form-control" name="txtPrice" required>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Seller Contact</label>
                <input type="text" class="form-control" name="txtSellerContact"
                    value="<?php echo $row['contact_number'];?>" required> 
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="addCombo">Add Combo Set</button>
            </div>
        </form>
    </div>
</body>

</html>