<?php 
error_reporting(0);
// include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if(isset($_POST['submit']))
{
  if(empty($_POST['uname']) || empty($_POST['current_p']) || empty($_POST['new_p']) )
    {
      echo "<script>alert('All fields are required')</script>";
      header('location: password.php');
    }
    else
    {
      if(strlen($_POST['current_p']) < 4 || strlen($_POST['new_p']) < 4 )
      {
        $_SESSION['status']="Password Length too short";
        header('location:password.php');
      }
      else
      {
        $uname=$_POST['uname'];
        $currentp=$_POST['current_p'];
        $newp=$_POST['new_p'];
        $sql="Select * from admin where UserName='$uname' and Password='$currentp'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
        if($row>0)
        {
          $s="update admin set Password='$newp' where UserName='$uname'";
          $q=mysqli_query($conn,$sql);
          $_SESSION['status']="Password changed successfully";
        }
        else
        {
          $_SESSION['status']="Invalid username or Password";
        }
      }
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
            <h1 class="m-0" style="color:blue;">Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
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
               <h3 class="card-title">Change Password</h3>
               <a href="index.php" class="btn btn-danger btn-sm float-right">Back</a>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
                   
     <form action="#" method="post">
     <div class="modal-body">
        
              <div class="form-group">
           <label for="">User Name</label>
           <input type="text" name="uname" class="form-control" placeholder="Username">
       </div>

       <div class="form-group">
           <label for="">Current Password</label>
           <input type="password" name="current_p" class="form-control" placeholder="Old Password">
       </div>
       <div class="form-group">
           <label for="">New Password</label>
           <input type="password" name="new_p" class="form-control" placeholder="New Password">
       </div>
     </div>
     <div class="modal-footer">
       <button type="submit" name="submit" class="btn btn-primary">Update</button>
     </div>
     
     <?php
     //       }
     //}
    
    //  else{
    //   echo "No ID found";

    //  }
    // }

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