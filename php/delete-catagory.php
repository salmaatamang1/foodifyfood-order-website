<?php
include('../config/constant.php');
//check weather the id and image name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{

    //get valuue and delete
    //echo"get value and delete";
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

   //remove the physical image file if it is available
   if($image_name!="")
   {
       //image is available and so remove it 
       $path="../image/catagory/".$image_name;
       //remove img
       $remove=unlink($path);

        //if fail to remove image then display msg of error
       if($remove==false)
       {
         //set the sessin msg
         $_SESSION['remove']="<div class='error'>Failed to remove image</div>";
         //redirect to manage catagory page
         header('location:'.SITEURL.'php/manage-catagory.php');
       }
   }

   //delete data from database
   //sql query to delete data fromdatabase
   $sql="DELETE FROM tbl_catagory WHERE id=$id";

   //redirect to manage Catagory page
    $res=mysqli_query($conn,$sql);

    //check weather the data deleted from database or not
    if($res==true)
    {
        //set success msg and redirect to manage catagory 
        $_SESSION['delete']="<div class='success'>Catagory deleted successfully</div>";
        header('location:'.SITEURL.'php/manage-catagory.php');
    }
    else
    {
       //set failed msg and redirect to manage catagory
       $_SESSION['delete']="<div class='error'>Failed to delete catagory </div>";
       header('location:'.SITEURL.'php/manage-catagory.php');
    }
}
else
{
    //redirect tomanage catagory page
    header('location:'.SITEURL.'php/manage-catagory.php');
     
}

?>