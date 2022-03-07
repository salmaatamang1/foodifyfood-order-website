<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
             //1.get the id of selected admin
             $id=$_GET['id'];
             //2.create SQL to ge the details
             $sql="SELECT * FROM tbl_admin WHERE id=$id";
             //3.execute the query
             $res=mysqli_query($conn,$sql );
             //4.check the query executed or not
             if($res==true)
             {
                 //check wheather the data available or not
                 $count=mysqli_num_rows($res);
                 //check we have data or not
                 if($count==1)
                 {
                 //get the details
                 //echo"Admin available";
                 $row=mysqli_fetch_assoc($res);
                $full_name=$row['full_name'];
                $username=$row['username'];
                 }
                 else
                 {
                     //we will redirect to manage the admin page
                     header('location:'.SITEURL.'php/manage-admin.php');
                  }
                }
        ?>

       <form action="" method="POST">

       <table class="tbl-30">
           <tr>
               <td>Full Name:</td>
               <td><input type="text" name="full_name" value="<?php echo $full_name?>" ></td>
           </tr>
           <tr>
               <td>Username:</td>
               <td><input type="text" name="username" value="<?php echo $username?>" ></td>
           </tr>
           <tr>
               <td colspan="2"> 
                   <input type="hidden" name="id" value="<?php echo $id?>">
                   <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
               </td>
           </tr>
       </table>

       </form>
    </div>
</div>
<?php
//check wheather the submit button is clicked or not
if(isset($_POST['submit']))
{
    //echo "btn clicked";
    //get all the value from form to be updated
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];

    //create sql query to update admin
    $sql="UPDATE tbl_admin SET
    full_name='$full_name',
    username='$username' 
    WHERE id='$id'
    ";
    //execute query
    $res=mysqli_query($conn,$sql);

    //check the query executed succesfull or not
    if($res==true)
    {
     $_SESSION['update']="<div class='success'>Admin updated successfully</div>";
     header('location:'.SITEURL.'php/manage-admin.php');
    }
    else 
    {
        $_SESSION['update']="<div class='error'>Fail to Update ASdmin.</div>";
        header('location:'.SITEURL.'php/manage-admin.php');
    }


}
?>

<?php
include('partials/footer.php');
?>