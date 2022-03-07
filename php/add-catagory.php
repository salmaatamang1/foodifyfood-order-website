<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
     <h1>Add Category<h1>
         <br><br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
           
        ?><br><br>

         <!--start form-->
         <form action="" method="post" enctype="multipart/form-data">
             <table class="tbl-30">
                 <tr>
                     <td>Title:</td>
                     <td>
                         <input type="text" name="title" placeholder="Category title">
                     </td>
                 </tr>
                 <tr>
                     <td>Select Image:</td>
                     <td>
                         <input type="file" name="image"/>
                     </td>
                 </tr>
                 <tr>
                     <td>Featured:</td>
                     <td>
                         <input type="radio" name="featured" value="Yes">yes
                         <input type="radio" name="featured" value="No">no 
                     </td>
                 </tr>
                 <tr>
                     <td>Active:</td>
                     <td>
                         <input type="radio" name="active" value="Yes">yes 
                         <input type="radio" name="active" value="No">no 
                     </td>
                 </tr>
                 <tr>
                     <td colspan="2">
                      <input type="submit" name="submit" value="Add Category" class="btn-danger">
                     </td>

                 </tr>
              </table>
        
         </form>
         <!--ends form-->

         <?php

         //weather thevsubmit btn click or not
         if(isset($_POST['submit']))
         {
           //get value from  category form
           $title=$_POST['title'];

           //for radio input type we need to check the btn is selected or not
           if(isset($_POST['featured']))
           {
               //get te value if selected else default value will be selected as no
               $featured=$_POST['featured'];
           }
           else
           {
            $featured="No";  
           }
           if(isset($_POST['active']))
           {
               //get te value if selected else default value will be selected as no
               $active=$_POST['active'];
           }
           else
           {
            $active="No";  
           }
           //check image select or not
           //print_r($_FILES['image']);
           //die();//break the code
           if(isset($_FILES['image']['name']))
           {
              //llupload the img
              //to upload img we need image name and sr path and des path
              $image_name=$_FILES['image']['name'];

              //upload the image only if image is selected
              //section for autorename of image
              //1.get the extension of our imag(jpg,png,gif etc)
              $ext=end(explode('.',$image_name));//break the image name for example food1.jpg then food1 is one part and .jpg is another part
              
              //rename the img
              $image_name="Food_Catagory_".rand(000,999).'.'.$ext;//egfood_catagory_ramdom number fron 000 to 999.ext(.jpg)


              $source_path=$_FILES['image']['tmp_name'];
              $destination_path='../image/catagory/'.$image_name;

              //upload the imgs
              $upload = move_uploaded_file($source_path, $destination_path);

              //check wheather the img is uploaded or not
              //if not uploadd then we willstop process here and redirect to error msg
              if($upload==false)
              {
                  //we will set msg
                  $_SESSION['upload'] ="<div class='error'>Fail to upload image</div>";

                  //redirect to ad catagory page
                  header('location:'.SITEURL.'php/add-catagory.php');

                  //stop process
                 die();
              }
            
           }
           else
           {
             //dont upload img
             $image_name="";
           }
        
           //2.cteate sql query to insert into datadase
           $sql="INSERT INTO tbl_catagory SET 
           title='$title',
           image_name='$image_name',
           featured='$featured',
           active='$active'
           ";
           
         //execute the query and save in database
         $res=mysqli_query($conn,$sql);

         //query executed successfull or not and data added or not
         if($res==true)
         {
             //Query executed and category addes
             $_SESSION['add']="<div class='success'>Category added Successfully</div>";
             //redirect to manage category Page
             header('location:'.SITEURL.'php/manage-catagory.php');
         }
         else
         {
              //fail to add to category
              $_SESSION['add']="<div class='error'>Failed to add category</div>";
             //redirect to manage category Page
             header('location:'.SITEURL.'php/add-catagory.php');
         }
         }
         ?>
    </div>
</div>
<?php
include('partials/footer.php');
?>