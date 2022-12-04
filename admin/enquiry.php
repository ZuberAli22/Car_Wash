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
                    <h1 class="m-0" style="color:blue;">Enquiry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Enquiry</li>
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
                        <h3 class="card-title">Enquiry</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped" style="text-align:center;">
                            <thead>
                                <tr>
                                <th>Ticket id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject </th>
                                <th>Description </th>
                                <th>Posting date </th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * from tblenquiry";                                
                                $ret=mysqli_query($conn,$sql);

                            
                            if(mysqli_num_rows($ret)>0)
                            {
                            while ($row=mysqli_fetch_array($ret)) {

?>

                                <tr>
                                    <th><?php echo $row['id'];?></th>
                                    <td><?php echo $row['FullName'];?></td>
                                   		
                                    <td><?php echo $row['EmailId'];?></td>
                                    <td><?php  echo $row['Subject'];?></td>
                                    <td><?php  echo $row['Description'];?></td>
                                    <td><?php  echo $row['PostingDate'];?></td>

                                    

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