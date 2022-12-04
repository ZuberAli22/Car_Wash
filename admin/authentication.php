<?php
session_set_cookie_params(0);
session_start();
include('config/dbconnection.php');
if(!$_SESSION['alogin'])
{
    $_SESSION['status']="Login to access the dashboard";
    header("location: login.php");
    exit(0);
}
?>

