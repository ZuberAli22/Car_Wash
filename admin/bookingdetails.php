<?php 
error_reporting(0);
// include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if(isset($_POST['update']))
{
    $cid=$_GET['viewid'];
    $type=$_POST['type'];
    $tno=$_POST['tno'];
    $msg=$_POST['msg'];
    $sql="update tblcarwashbooking set adminRemark='$msg', paymentMode='$type', txnNumber='$tno', status='Completed' where id='$cid'";
   $query=mysqli_query($conn,$sql);
    if ($query) {
    
    echo '<script>alert("All remark has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='allbookings.php'; </script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
        }
  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:blue;">View Booking</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Booking</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                   if(isset($_SESSION['status'])){
                       echo "<h4>".$_SESSION['status']."</h4>";
                       unset($_SESSION['status']);
                   }
               ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View Bookings</h3>
                        <a href="allbookings.php" class="btn btn-danger btn-sm float-right">Back</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                            <tbody>
                        <?php
$cid=$_GET['viewid'];
$sql = "SELECT * from tblcarwashbooking
join tblwashingpoints on tblwashingpoints.id=tblcarwashbooking.carWashPoint
 where tblcarwashbooking.id='$cid'";
 $ret=mysqli_query($conn,$sql);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                            <tr>
                                <th>Booking ID</th>
                                <td><?php  echo $row['bookingId'];?></td>
                                <th>Posting Date</th>
                                <td><?php  echo $row['postingDate'];?></td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td><?php  echo $row['fullName'];?></td>
                                <th>Mobile Number</th>
                                <td><?php  echo $row['mobileNumber'];?></td>
                            </tr>
                            <tr>
                                <th>Package Type</th>
                                <td><?php $ptype=$row['packageType'];
if($ptype==1): echo "BASIC CLEANING ($10.99)";endif;
if($ptype==2): echo "PREMIUM CLEANING ($20.99)";endif;
if($ptype==3): echo "COMPLEX CLEANING ($30.99)";endif;


							?></td>
                                <th>Washing Point</th>
                                <td><?php  echo $row['washingPointName'];?>
                                    <?php  echo $row['washingPointAddress'];?></td>
                            </tr>


                            <tr>
                                <th>Washing Date</th>
                                <td><?php  echo $row['washDate'];?></td>
                            
                                <th>Washing Time</th>
                                <td><?php  echo $row['washTime'];?></td>
                            </tr>

                            <tr>
                                <th>Message(if any)</th>
                                <td><?php  echo $row['message'];?></td>
                            </tr>
                            <tr>
                                    <th>Status</th>
                                    <td ><?php echo $row['status'];?></td>
                                </tr>
                                <?php if($row['adminRemark']==''): ?>
                                <tr>
                                    <td >
                                        <button data-toggle="modal" data-target="#myModal" class="btn-primary btn">Take
                                            Action</button>
                                    </td>
                                </tr>
                                <?php  else:?>

                                <tr>
                                    <td colspan="4"
                                        style="color:blue; font-size:22px; text-align:center; font-weight:bold;">Admin
                                        Details</td>
                                </tr>

                                <tr>
                                    <th>Transaction Type</th>
                                    <td><?php echo $row['paymentMode'];?></td>
                                    <th>Transaction No.(if any)</th>
                                    <td><?php echo $row['txnNumber'];?></td>
                                </tr>
                                <tr>
                                    <th>Admin Remark</th>
                                    <td ><?php echo $row['adminRemark'];?></td>
                                </tr>
                                <?php endif;?>

                                <?php }   ?>
                        </table>
                        <br>
                   
                    </div>
                    <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Booking</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <p>
                                        <select name="type" required class="form-control">
                                            <option value="">Transaction Type</option>
                                            <option value="e-Wallet">e-Wallet</option>
                                            <option value="UPI">UPI</option>
                                            <option value="Debit/Credit Card">Debit/Credit Card</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Other">Other</option>
                                        </select>



                                    <p><input type="text" name="tno" class="form-control"
                                            placeholder="Transaction Number (if any)"></p>

                                    <p><textarea name="msg" class="form-control" placeholder="Admin Remark"
                                            required></textarea></p>
                                    <p><input type="submit" class="btn btn-custom" name="update" value="Update"></p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php
    include('includes/script.php');
//  include('includes/footer.php');
?>