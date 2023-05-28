<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Saltic</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-!" href="aboutus.php"><img src="images/Logo.png" height="50px" width="70px" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="mainpage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="fish.php">Fish</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shellfish.php">ShellFish</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="comboSet.php">Combo Set</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">About Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php 
                            if(isset($_SESSION['username'])){ 
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Log Out</a>
                        </li>
                        <?php if($_SESSION['role'] == 0) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Manage User Profile</a>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Add Products
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="addnewfish.php">Add New Fish</a></li>
                                <li><a class="dropdown-item" href="addnewshellfish.php">Add New Shell Fish</a></li>
                                <li><a class="dropdown-item" href="addnewcomboset.php">Add New Combo Set</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                My Products
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="myfishproduct.php">My Fish</a></li>
                                <li><a class="dropdown-item" href="myshellfishproduct.php">My Shell Fish</a></li>
                                <li><a class="dropdown-item" href="mycombosetproduct.php">My Combo Set</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manageUser.php">My Profile</a>
                        </li>
                        <?php } } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>

                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>
