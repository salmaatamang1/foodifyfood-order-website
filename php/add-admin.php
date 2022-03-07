<?php 
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/><br/>

        <?php
        if(isset($_SESSION['add']))//checking wheather session set or not
        {
            echo $_SESSION['add'];//display of session
            unset($_SESSION['add']);//remove session message
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                    <td>UserName:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>
                    <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
</div>
</div>
<?php 
include('partials/footer.php');
?>
<?php
//process the value and add to it in data base
//check whether the buttonis clicked or not
if(isset($_POST['submit']))
{
    //1.getting data from form
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);//password encryption with MD5

    //2.Sql query to entry data into database
    $sql="INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";
//3.executing query and saving in data base
$res =mysqli_query($conn,$sql) or die(mysqli_error());

//check whether the data is inserted or not and display the msg
if($res==TRUE)
{
 //session variable to display msg
 $_SESSION['add']="Admin added Succesfully";
 //redirect page to manage admin
 header("location:".SITEURL.'php/manage-admin.php');

}
else
{
   //session variable to display msg
    $_SESSION['add']="fail to add admin";
    //redirect page to add admin
    header("location:".SITEURL.'php/manage-admin.php');
}
}

