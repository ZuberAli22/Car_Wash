<?php 
error_reporting(0);
// include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if(isset($_POST['edit_wp']))
  {

    $name=$_POST['wpname'];
    $add=$_POST['add'];
    $ph=$_POST['ph'];
    $email=$_POST['email'];
    $id=$_GET['editid'];
     $sql="update  tblwashingpoints set washingPointName='$name',washingPointAddress='$add',contactNumber='$ph',email='$email' where ID='$id' ";
    $query=mysqli_query($conn,$sql);
    if ($query) {
        $_SESSION['status']='Washing Point updated successfully';
        // header("location: manageservice.php");
    // echo "<script>alert('Service has been Updated.');</script>";
  }
  else
    {
      
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }

  
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:red;">Manage Washing Points</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">washingpoint</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content mt-4">
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
                            <h3 class="card-title">Edit Car Washing Point</h3>
                            <a href="managewp.php" class="btn btn-danger btn-sm float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="#" method="post" enctype="multipart/form-data">
                                <?php
if(isset($_GET['editid']))
{
  $id=$_GET['editid'];
  $query="SELECT * FROM tblwashingpoints WHERE ID='$id'";
  $result=mysqli_query($conn,$query);
  foreach($result as $item):

  ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Car Wash Point Name</label>
                                        <input type="text" name="wpname" value="<?php echo $item['washingPointName']; ?>"
                                            class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea type="text" name="add" value="" class="form-control"
                                            placeholder="Address"><?php echo $item['washingPointAddress']; ?>  </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contact Number</label>
                                        <input type="text" name="ph" value="<?php echo $item['contactNumber']; ?>"
                                            class="form-control" placeholder="Contact Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="<?php echo $item['email']; ?>"
                                            class="form-control" placeholder="Email">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="edit_wp" class="btn btn-sm btn-primary">Update</button>
                                    </div>
                                    <?php
     endforeach;
     }
     else{
      echo "No ID found";

     }


?>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include('includes/script.php');
include('includes/footer.php');
?>