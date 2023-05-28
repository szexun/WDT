<?php
	include('db.php');

    // get the value from the form
    // escape the special characters in the value
    // store in a variable


    // check whether the password and confirm password is not same
	
        // check whether the submit button is clicked or not
        if(isset($_POST['register'])){
            $username = mysqli_real_escape_string($conn ,$_POST['txtName']);
            $email = mysqli_real_escape_string($conn, $_POST['txtEmail']);
            $password = mysqli_real_escape_string($conn, $_POST['txtPassword']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
            $contact_number = mysqli_real_escape_string($conn, $_POST['txtContact']);
            // sql query to insert into database
            $sql_query = "INSERT INTO `users`(`username`, `password`, `email`, `contact_number`) 
            VALUES ('$username','$password','$email', '$contact_number')";
            
            // create select query 
            $query = "SELECT * FROM `users` WHERE email='$email'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);

            if($password == $confirm_password){
                if($count == 0){ // check the email is registered or not
                    // if sql query is executed successfully
                    if(mysqli_query($conn, $sql_query)){
                        header('location: login.php');
                    } else {
                        echo "Server Failed : " . mysqli_error($conn);
                    }
                } else {
                    echo "<script>alert('Email Registered!')</script>";
                }
            } else {
                echo "<script>alert('password and confirm password not same!')</script>";
                echo "<script>history.go(-1)</script>" ;
            }
        // close the previous open database connection
        
	    } 
        mysqli_close($conn);



	
?>

<!doctype html>
<html lang="en">

<head>
    <title>Registration Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/nunito-font.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/signup.css">

    <script src="js/script.js"></script>


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
                    <h3>Sign Up</h3>

                    <form action="" method="post" name="signUpForm" onsubmit="return(ValidateEmail(document.signUpForm.txtEmail))">

                        <div class="form-group">
                            <input type="text" class="form-control" name="txtName" id="txtName" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password"
                                required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                                placeholder="Confirm Password" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="txtContact" id="txtContact" placeholder="01x-xxxxxxx"
                                required>
                        </div>


                        <div class="form-group">
                            <input type="submit" name="register" id="register" class="form-control registerbutton" value="Register">
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="link">
                                Have an account? &nbsp; <a href="login.php">Login</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>