<?php error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
    if(empty($_POST['name']) ||empty($_POST['email']) ||empty($_POST['subject']) ||empty($_POST['message']))
    {
        echo "<script>alert('All fields are required');</script>";
    }
    else
    {
        if(!ctype_alpha($_POST['name']) ||!ctype_alpha($_POST['subject']))
        {
            echo "<script>alert('Only alphabets are required in name and subject');</script>";
        }
        else
        {
            $name=$_POST['name'];
            $email=$_POST['email'];   
            $subject=$_POST['subject'];
            $message=$_POST['message'];
            $sql="INSERT INTO `tblenquiry`(`FullName`,`EmailId`,`Subject`,`Description`) VALUES('$name','$email','$subject','$message')";
            $query = mysqli_query($conn,$sql);
            if($query)
            {
            echo "<script>alert('Query sent successfully');</script>";
            echo "<script>window.location.href ='contact.php'</script>";
            }
            else 
            {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        }
    }
}

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Contact Us</title>
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
<?php include_once('includes/header.php');?>

        
        
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="contact.php">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Get In Touch</p>
                    <h2>Contact for any query</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h2>Quick Contact Info</h2>

  <div class="contact-info-item">
    <?php

    $sql="select * from tblpages where type='contact'";
    $query=mysqli_query($conn,$sql);
   
    foreach($query as $row)
    {
        
    ?>
                                <div class="contact-info-icon">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Address</h3>
                                    <p><?php echo $row['detail']; ?></p>
                                </div>
                            </div>


                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Opening Hour</h3>
                                    <p><?php echo $row['openignHrs']; ?></p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Call Us</h3>
                                    <p><?php echo $row['phoneNumber']; ?></p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Email Us</h3>
                                    <p><?php echo $row['emailId']; ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="sentMessage" action=# id="contactForm" method="post">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" name="name" /><br />
                           
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" name="email"  /> <br />
                                
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" /> <br />
                       
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" id="message" placeholder="Message" name="message" ></textarea><br />
                 
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit" id="sendMessageButton" name="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
           
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
<?php include_once('includes/footer.php');?>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
   <!--  -->

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
