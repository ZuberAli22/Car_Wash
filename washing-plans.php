<?php 
include('includes/config.php'); 
if(isset($_POST['book']))
{
    if(empty($_POST['packagetype']) ||empty($_POST['washingpoint']) ||empty($_POST['fname']) ||
    empty($_POST['contactno']) || empty($_POST['washdate']) ||empty($_POST['washtime']) ||
    empty($_POST['message']))
    {
        echo "<script>alert('All fields are required');</script>";
    }
    else
    {
        if(!ctype_alpha($_POST['fname']))
        {
            echo "<script>alert('Only alphabets are required in name');</script>";
        }
        else
        {
            $ptype=$_POST['packagetype'];
            $wpoint=$_POST['washingpoint'];   
            $fname=$_POST['fname'];
            $mobile=$_POST['contactno'];
            $date=$_POST['washdate'];
            $time=$_POST['washtime'];
            $message=$_POST['message'];
            $status='New';
            $bno=mt_rand(100000000, 999999999);
            $sql="INSERT INTO `tblcarwashbooking`(`bookingId`,`packageType`,`carWashPoint`,`fullName`,`mobileNumber`,`washDate`,`washTime`,`message`,`status`) 
            VALUES($bno,'$ptype','$wpoint', '$fname', '$mobile', '$date', '$time', '$message','$status')";
            $query = mysqli_query($conn, $sql);
            if ($query)
            {
            echo '<script>alert("Your booking done successfully")</script>';
            echo "<script>window.location.href ='washing-plans.php'</script>";
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
    <title>Washing Plans</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
 <link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php include('includes/header.php'); ?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Washing Plan</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <a href="washing-plans.php">Price</a>
                </div>
            </div>
        </div>
    </div>
<!-- Price Start -->
<div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Washing Plan</p>
                    <h2>Choose Your Plan</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="price-header">
                                <h3>Basic Cleaning</h3>
                                <h2><span>Rs</span><strong>1000</strong></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                    <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                    <li><i class="far fa-times-circle"></i>Interior Wet Cleaning</li>
                                    <li><i class="far fa-times-circle"></i>Window Wiping</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom"  data-toggle="modal" data-target="#myModal">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="price-item featured-item">
                            <div class="price-header">
                                <h3>Premium Cleaning</h3>
                                <h2><span>Rs</span><strong>2000</strong></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                    <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                    <li><i class="far fa-times-circle"></i>Window Wiping</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom" data-toggle="modal" data-target="#myModal">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="price-header">
                                <h3>Complex Cleaning</h3>
                                <h2><span>Rs</span><strong>3000</strong></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                    <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Window Wiping</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom" data-toggle="modal" data-target="#myModal">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Price End -->
        
       <?php include_once('includes/footer.php');?>

<!--Model-->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Car Wash Booking</h4>
        </div>
        <div class="modal-body">
<form method="post">   
  <p>
            <select name="packagetype" class="form-control">
                <option value="">Package Type</option>
                <option value="1">BASIC CLEANING (Rs 1000)</option>
                 <option value="2">PREMIUM CLEANING (Rs 2000)</option>
                  <option value="3 ">COMPLEX CLEANING(Rs 3000)</option>
              </select>

          <p>
            <select name="washingpoint" class="form-control">
                <option value="">Select Washing Point</option>
<?php
 $sql = "SELECT * from tblwashingpoints";
$query = mysqli_query($conn,$sql);
foreach($query as $result)
{               ?>  
    <option value="<?php echo htmlentities($result['id']);?>">
    <?php echo htmlentities($result['washingPointName']);?> 
    (<?php echo htmlentities($result['washingPointAddress']);?>)</option>
<?php } ?>
            </select></p>
            <p><input type="text" name="fname" class="form-control" placeholder="Full Name"></p>
            <p><input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" placeholder="Mobile No."></p>
            <p style="color:black;">Wash Date <br /><input type="date" name="washdate" class="form-control"></p>
             <p style="color:black;">Wash Time <br /><input type="time" name="washtime" class="form-control"></p>
             <p><textarea name="message"  class="form-control" placeholder="Message if any"></textarea></p>
             <p><input type="submit" class="btn btn-custom" name="book" value="Book Now"></p>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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