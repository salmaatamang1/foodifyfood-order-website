<?php
include('../config/constant.php');
//1.get id of admin to be deleted
$id=$_GET['id'];

//2.create sql query to delete admin
$sql="DELETE FROM tbl_admin WHERE id=$id";

//execute the query
$res=mysqli_query($conn,$sql);

//check weather the query executed successfully or not
if($res==TRUE)
{
    //query to executed for admin deleted
    //echo "Admin deleted";
    //create the session variable to dispaly msg
    $_SESSION['delete']="<div class='success'>Admin deleted successfully</div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'php/manage-admin.php');

}
else
{
 //query in problem to delete
 //echo "Admin not  deleted";
 $_SESSION['delete']="<div class='error'Failed to delete admin.Try it later.</div>";
 header('location:'.SITEURL.'php/manage-admin.php');
}

//3.redirect to manage admin page with message(success or error)
?>