<?php 
error_reporting(0);
// include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');


  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:blue;">All Bookings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bookings</li>
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
                        <h3 class="card-title">All Bookings</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Package Type</th>
                                    <th>Washing Point </th>
                                    <th>Address </th>
                                    <th>Washing Date/Time </th>
                                    <th>Posting date </th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT *,tblcarwashbooking.id as bid from tblcarwashbooking
                                join tblwashingpoints on tblwashingpoints.id=tblcarwashbooking.carWashPoint";                                
                                $ret=mysqli_query($conn,$sql);

                            
                            if(mysqli_num_rows($ret)>0)
                            {
                            while ($row=mysqli_fetch_array($ret)) {

?>

                                <tr>
                                    <th><?php echo $row['bid'];?></th>
                                    <td><?php echo $row['fullName'];?></td>
                                    <td><?php $ptype=$row['packageType'];
                                    if($ptype==1): echo "BASIC CLEANING ($10.99)";endif;
                                    if($ptype==2): echo "PREMIUM CLEANING ($20.99)";endif;
                                    if($ptype==3): echo "COMPLEX CLEANING ($30.99)";endif;
    							?></td>
							
                                    <td><?php echo $row['washingPointName'];?></td>
                                    <td><?php  echo $row['washingPointAddress'];?></td>
                                    <td><?php  echo $row['washDate'].'/'.$row['washTime'];?></td>
                                    <td><?php  echo $row['postingDate'];?></td>

                                    <td><a href="bookingdetails.php?viewid=<?php echo $row['bid'];?>"
                                            class="btn btn-sm btn-primary">View</a>
                                        </td>

                                </tr>
                                <?php 

}}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/script.php');
include('includes/footer.php');
?>