<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Car Wash management System | About Us Page</title>
   
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
<?php include('includes/header.php');?>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>About Us</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="about.php">About Us</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/about2.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>About Us</p>
                            <h2>car washing and detailing</h2>
                        </div>
                        <div class="about-content">
                        <?php 
$sql = "SELECT type,detail from tblpages where type='aboutus'";
$query =mysqli_query($conn,$sql);
foreach($query as $result)
{       
?>

                            <p>
                            <?php   echo $result['detail']; ?>
                            </p>
                        <?php } ?>

                            <!-- <p>
                            Car Wash Management System is a brand which is literally going to change the way people think about car cleaning. 
                            It is a unique mechanized car cleaning concept where cars are getting pampered by the latest equipments including high pressure cleaning machines,
                             spray injection and extraction machines, high powered vacuum cleaners, steam cleaners and so on. 
                             Car Wash Management System is a brand that is literally going to change the way people think about car cleaning. 
                             It is a unique mechanized car cleaning concept where cars are getting pampered by the latest equipments including high pressure cleaning machines, 
                             spray injection and extraction machines, high powered vacuum cleaners, steam cleaners and so on.

                            </p> -->
                        <hr />
                            <ul>
                                <li><i class="far fa-check-circle"></i>Seats washing</li>
                                <li><i class="far fa-check-circle"></i>Vacuum cleaning</li>
                                <li><i class="far fa-check-circle"></i>Interior Washing</li>
                                <li><i class="far fa-check-circle"></i>Window wiping</li>
                                <li><i class="far fa-check-circle"></i>Wet Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Oil Changing</li>
                                <li><i class="far fa-check-circle"></i>Break Repairing</li>
                                <li><i class="far fa-check-circle"></i>Exterior Washing</li>
                            </ul>
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        



        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
<?php include_once('includes/footer.php');?>

