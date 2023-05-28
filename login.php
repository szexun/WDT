<?php
    include('db.php');

    // start the session
    session_start();
    
    // if submit is clicked
    if(isset($_POST['login'])){
    // get the value from the form and store in a variable
        $username = $_POST['txtName'];
        $password = $_POST['txtPassword'];
        // sql query to retrieve users' data from the database based on the username and password entered
        $sql_query = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
        // store the sql query result in a variable
        $result = mysqli_query($conn, $sql_query);
        // return row of data as an associative array
        $row = mysqli_fetch_assoc($result);
        // count the number of row return
        $count = mysqli_num_rows($result);
            // if it is equal to 1
            if($count == 1){
                // set session for id, username, email, user role and seller contact
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['user_role'];
                $_SESSION['seller_contact'] = $row['contact_number'];
                echo $_SESSION['username'];
                header("location: mainpage.php");
            } else {
                echo "<script>alert('Account unregistered yet!')</script>";
            }
    }
    
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/nunito-font.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/login.css">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Saltic</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="login-wrap">
                    <div class="icon justify-content-center">
                        <span class="fa fa-user-o"></span>
                    </div>
                    <h3>Sign In</h3>

                    <form action="" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" name="txtName" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="txtPassword" placeholder="Password"
                                required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="form-control loginbutton" name="login">Login</button>
                        </div>

                        <div class="form-group d-md-flex">
                            <div class="link">
                                <a href="skip.php">skip for now</a>
                            </div>
                            <div class="link signuplink">
                                <a href="signup.php">Don't have an account?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>