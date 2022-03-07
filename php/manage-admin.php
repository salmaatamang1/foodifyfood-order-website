<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Admin</h1>

    <br/>
<?php
if(isset($_SESSION['add']))
{
echo$_SESSION['add'];//display session message
unset($_SESSION['add']);//removing session message
}
if(isset($_SESSION['delete']))
{
echo$_SESSION['delete'];
unset($_SESSION['delete']);
}
if(isset($_SESSION['update']))
{
    echo$_SESSION['update'];
    unset($_SESSION['update']);
    }
 if(isset($_SESSION['user-not-found']))
{
    echo$_SESSION['user-not-found'];
    unset($_SESSION['user-not-found']);
    }
    if(isset($_SESSION['psw-not-match']))
{
    echo$_SESSION['psw-not-match'];
    unset($_SESSION['psw-not-match']);
    }
    if(isset($_SESSION['change-pwd']))
    {
        echo$_SESSION['change-pwd'];
        unset($_SESSION['change-pwd']);
        }

?>
<br/><br/><br/>
    <!--butto to add admin-->
    <a href="add-admin.php" class="btn-primary"> Add Admin</a>
    <br/><br/><br/>

    <table class="tbl-full">
        <tr>
            <th> S.N</th>
            <th>Full Name</th>
            <th>User name</th>
            <th>Actions</th>
        </tr>



        <?php
        //Query to get all admin
        $sql="SELECT *FROM tbl_admin";
        //execute the Query
        $res=mysqli_query($conn,$sql);
        //check whether theQuery is executed or not
        if($res==TRUE)
        {
            //count rows to check weheather we have data in database or not
            $count=mysqli_num_rows($res);//fxn to get alll the rows in database
            //check the num of rows
            $sn=1;//create a varaiable and assign value
            if($count>0)
            {
                while($rows=mysqli_fetch_assoc($res))
                {
                    //using while loop to get all the data from databaseand it will run aslongaswe have data
                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];
                     //display value in table
                     ?>
                     <tr>
            <td><?php echo $sn++;?></td>
            <td><?php echo $full_name;?></td>
            <td><?php echo $username;?></td>
             <td>
                 <a href="<?php echo SITEURL; ?>php/update-password.php? id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                <a href="<?php echo SITEURL; ?>php/update-admin.php? id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                <a href="<?php echo SITEURL; ?>php/delete-admin.php? id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
            </td>
        </tr>
                     <?php


                }

            }
            else
            {
              //fggdhgfgh
            }
        }

        ?>
    </table>

     </div>
</div>
<?php
include('partials/footer.php');
?>
    