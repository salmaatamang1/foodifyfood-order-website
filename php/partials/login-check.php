<?php
//access control
//check wheather user log in or not..
if(!isset($_SESSION['user']))//if user session is not set 
{
//if user session is not set then redirect to log in page
$_SESSION['no-login-message']="<div class='error text-center'>Please Login Here! To Access Admin Panel</div>" ;
//redirect to login page
header('location:'.SITEURL.'php/login.php');
}

?>