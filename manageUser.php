<?php
    include 'db.php';
    include 'navbar.php';
    
    // start session if it is not set
    if(!isset($_SESSION)){
        session_start();
    }
    // get the user's id from the URL
    $id = $_SESSION['id'];
    // sql query to retrieve user's data from the database based on the user's id
    $sql_query = "SELECT * FROM users WHERE id = '$id'";
    // store the result of sql query in a variable
    $result = mysqli_query($conn, $sql_query);
    // fetch a row of data as an associative array
    $row = mysqli_fetch_assoc($result); 

    // if submit button is clicked
    if(isset($_POST['updateRecord'])){
        // get the value from the form and store in a variable
        $username = $_POST['txtName'];
        $email = $_POST['txtEmail'];
        $contact = $_POST['txtContact'];
        $password = $_POST['txtPassword'];
        $contact_number = $_POST['txtContact'];
        //create update sql
        $query = "UPDATE `users` SET `username`='$username',`password`='$password',`email`='$email', `contact_number`='$contact_number' WHERE id='$id'";
        $query2 ="UPDATE `fish` SET `seller_contact`='$contact_number' WHERE user_id = '$id'";
        $query3 ="UPDATE `shellfish` SET `seller_contact`='$contact_number' WHERE user_id = '$id'";
        $query4 ="UPDATE `comboset` SET `seller_contact`='$contact_number' WHERE user_id = '$id'";
        // execute update sql
        mysqli_query($conn, $query2);
        mysqli_query($conn, $query3);
        mysqli_query($conn, $query4);
        // if query is executed successfully
        mysqli_query($conn, $query);

        echo "<script> window.location.href='mainpage.php';</script>";
        mysqli_close($conn);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta username="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    <link rel="stylesheet" href="css/user.css" type="text/css">
</head>
<body>
    <form action="" method="post">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">Welcome To Your Profile Page!</span>
                    <span class="text-black-50">You May Edit Your Personal Details Here!</span><span></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">My Profile</h4>
                    </div>
                    <div class="form__group">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="username" name="txtName" value="<?php echo $row['username'] ?>">
                                <label for="username "class="labels">Full Name</label>
                                <br>
                                <input type="email" class="form-control" id="input-email" name='txtEmail' value="<?php echo $row['email'] ?>">
                                <label class="labels" for="input-email">Email Address</label>
                                <br>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Security</span></div><br>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo $row['password'] ?>" id="password" name="txtPassword">
                        <label class="labels" for="input-new-password">New Password</label>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo $row['contact_number'] ?>" id="txtContact" name="txtContact">
                        <label class="labels" for="input-new-password">Contact</label>
                    </div>
                    <br>
                    <button type="submit" name="updateRecord" value="Update Record" class="btn btn-outline-primary">Update Record</button>
                    
                </div>
            </div>
        </div>
    </div>
    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>