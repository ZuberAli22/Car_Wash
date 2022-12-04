<?php 
error_reporting(0);
// include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconnection.php');
if(isset($_POST['add_service']))
{
    if(empty($_POST['wpname']) || empty($_POST['address']) || empty($_POST['ph']) || empty($_POST['email']))
    {
        echo "<script>alert('All fields are required ')</script>";
        header('location: addwp.php');
    }
    else
    {
        if(!ctype_alpha($_POST['wpname']))
        {
            echo "<script>alert('Only alphabets required in washing point name')</script>";
            header('location: addwp.php');
        }
        else{
            if(!is_numeric($_POST['ph']) || strlen($_POST['ph']) <10)
            {
                echo "<script>alert('Only 10 digit phone number required ')</script>";

            }
            else{
                $name=$_POST['wpname'];
                $add=$_POST['address'];
                $ph=$_POST['ph'];
                $email=$_POST['email'];
                $sql="INSERT INTO `tblwashingpoints`(washingPointName,washingPointAddress,contactNumber,email) VALUES('$name','$add','$ph','$email')";
                $query=mysqli_query($conn,$sql);
                if($query)
                {
                    $_SESSION['status']='Washing point added successfully';
                    // header("location: addservice.php");
                }
                else
                {
                    $_SESSION['status']='Failed';
                    header("location: addwp.php");

                }
            }
        }
    }
    
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:blue;">Washing Points</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">washingpoints</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
                        <h3 class="card-title">Add Washing Point</h3>
                    </div>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="s_id" value="<?php echo $row['id']; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Car Washing Point Name</label>
                                <input type="text" name="wpname" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea type="text" name="address" class="form-control" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Contact Number</label>
                                <input type="text" name="ph" class="form-control" placeholder="Contact">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="add_service" class="btn btn-primary">Add</button>
                            </div>

                    </form>
                </div>



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