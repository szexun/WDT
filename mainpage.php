<?php 
    include('navbar.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/footer.css">

    <link rel="shortcut icon" type="image/x-icon"
        href="https://i.pinimg.com/originals/ef/f3/bf/eff3bf95d0e3c87864867cdecc4e445d.png" />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Source+Code+Pro:wght@300&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="bigLeftBox"></div>
    <div id="bigRightBox">
        <div id="smallbox1">
            <p>WELCOME TO SALTIC MARKET</p>
        </div>
    </div>
    <div class="section1">
        <button class="Box1" onclick="location.href='fish.php';"></button>
        <button class="Box2" onclick="location.href='shellfish.php';"></button>
        <button class="Box3" onclick="location.href='comboSet.php';"></button>
        <button class="Box4" onclick="location.href='comboSet.php';"></button>
    </div>
    <?php echo "."?>
    <div>
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
    </div>
        
   
</body>

</html>