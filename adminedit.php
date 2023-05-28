<?php
    include('db.php');
    include('navbar.php');
    
    // get the user's id from the URL
    $id = $_GET['id'];
    // sql query to retrieve user's data based on user's id 
    $sql_query = "SELECT * FROM users WHERE id = '$id'";
    // store the result of sql query into a variable
    $result = mysqli_query($conn, $sql_query);
    // return the row of result as an associative array
    $row = mysqli_fetch_assoc($result);

    // if submit button is clicked
    if(isset($_POST['updateRecord'])){
         // get the value from the form and store in a variable respectively
        $username = $_POST['txtUsername']; 
        $password = $_POST['txtPassword'];
        $email = $_POST['txtEmail'];
        $role = $_POST['txtUserRole'];
        // sql query to update information in database
        $query = "UPDATE `users` SET `username`='$username',`password`='$password',`email`='$email',`user_role`='$role' WHERE id ='$id'";
        
        // if sql query is executed successfully
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Update Successfully!')</script>";
            header('location: admin.php');
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

</head>

<body>
    <div>
        <h1>Edit User Profile</h1>
    </div>
    <div class="container">
        <div class="col-md-6">
            <label for="" class="form-label">ID: </label> <?php echo $row['id']?>
        </div>
        <form class="row g-3" action="" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Username</label>
                <input type="text" class="form-control" name="txtUsername" value="<?php echo $row['username']?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="text" class="form-control" name="txtPassword" value="<?php echo $row['password']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" name="txtEmail" value="<?php echo $row['email']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">User Role</label>
                <input type="text" class="form-control" name="txtUserRole" value="<?php echo $row['user_role']?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="updateRecord">Update Record</button>
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