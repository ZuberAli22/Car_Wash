<?php 
// include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');

if(isset($_POST['edit_contact']))
  {
   
    $email=$_POST['email'];
    $time=$_POST['time'];
    $mobno=$_POST['mobno'];
    $add=$_POST['pagedes'];
    $sql="update tblpages set detail='$add',emailId='$email',phoneNumber='$mobno',openignHrs='$time' 
    where  type='contact'";
    $query=mysqli_query($conn,$sql);
    if ($query) {
        $_SESSION['status']='Contact us has been updated';
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
                    <h1 class="m-0" style="color:blue;">Contact Us</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
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
                            <h3 class="card-title">Update Contact Us</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="#" method="post" >
                                <?php

  
  $query="SELECT * FROM tblpages WHERE type='contact'";
  $result=mysqli_query($conn,$query);
  foreach($result as $item):

  ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Page Title</label>
                                        <input type="text" name="pagetitle" value="<?php echo $item['type']; ?>"
                                            class="form-control" placeholder="Title" readonly="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="<?php echo $item['emailId']; ?>"
                                            class="form-control" required placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mobile number</label>
                                        <input type="text" name="mobno" value="<?php echo $item['phoneNumber']; ?>"
                                            class="form-control" required placeholder="Mobile Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Opening hours</label>
                                        <input type="text" name="time" value="<?php echo $item['openignHrs']; ?>"
                                            class="form-control" required placeholder="Timing">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea type="text" name="pagedes" rows="4" value="" class="form-control"
                                            required placeholder="Description"><?php echo $item['detail']; ?> </textarea>
                                    </div>
                                                                      
                                    <div class="modal-footer">
                                        <button type="submit" name="edit_contact" class="btn btn-primary">Update</button>
                                    </div>
                                    <?php
     endforeach;
     
     


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