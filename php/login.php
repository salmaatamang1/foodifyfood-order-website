<?php
     include('../config/constant.php');
?>




<html>
    <head>
        <title> login system</title>
        <link rel="stylesheet" href="../css/admin.css"/>
    </head>
    <body class="back">
        <div class="login">
            <h1 class="text-center"><span style="color:#ED4C67">Login</span> </h1><br><br>
             <?php
               if(isset($_SESSION['login']))
               {
                   echo $_SESSION['login'];
                   unset($_SESSION['login']);
               }
               if(isset($_SESSION['no-login-message']))
               {
                   echo $_SESSION['no-login-message'];
                   unset($_SESSION['no-login-message']);
               }
             ?>
             <br><br>
            <!--login form starts here-->
            <form action="" method="post" class="text-center">
             Username:<br><br>
             <input type="text" name="username" placeholder="Enter Username"><br><br>
             Password:<br><br>
             <input type="password" name="password" placeholder="Enter Password"><br><br>
             <input type="submit" name="submit" value="login" class="btn-danger">
            </form><br><br>
            <!--login form ends here-->
            <p  class="text-center">Created By-<a href="https://github.com/salmaatamang1/salmaatamang1.github.io">salma</a></p>
        </div>
    </body>
 </html>
 <?php
 //check weather the submit btn click or not
 if(isset($_POST['submit']))
 {
     //process for login
     //1.get data for login page
     $username=$_POST['username'];
     $password=md5($_POST['password']);

     //2.sql query to check wheather the username and password exit or not
     $sql="SELECT *FROM tbl_admin WHERE username='$username' AND password='$password'";

     //3.execute query
     $res=mysqli_query($conn,$sql);

     //4.count rows to check wheather the user exist or not
     $count=mysqli_num_rows($res);
     if($count==1)
     {
       //user available
       $_SESSION['login'] ="<div class='success text-center'>Login Successful</div>";
       $_SESSION['user']=$username;//to check wheatherthe user is loged in or not and logout in unset it
       //redirect to to home page
       header('location:'.SITEURL.'php/');
     }
     else
     {
         //user not availabble
         $_SESSION['login'] ="<div class='error text-center'>Login failed</div>";
         //redirect to to home page
         header('location:'.SITEURL.'php/login.php');
     }



 }


 ?>