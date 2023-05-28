<?php
    include('db.php');
    include('navbar.php');

    // sql query to retrieve all the users' data from database
    $sql_query = "SELECT * FROM `users`";
    // store the sql query's result into a variable
    $result = mysqli_query($conn, $sql_query);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/footer.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/003d9094c3.js" crossorigin="anonymous"></script>
    
    <title>Admin Page</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>User Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)){ // return all the row of result as an associative until finish?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['password']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['user_role']?></td>
                    <td>
                        <a href="adminedit.php?id=<?php echo $row['id'] // add the user's id into URL ?>">
                            <i class="fas fa-user-edit"></i>
                        </a>
                        |
                        <a href="admindelete.php?id=<?php echo $row['id'] // add the user's id into URL ?>">
                            <i><i class="fas fa-trash"></i></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
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