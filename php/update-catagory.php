<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1> Update Catagory</h1>

        <br><br>

        <?php
        //check the id is set or not
        if(isset($_GET['id']))
        {
            //get id and other details
            $id=$_GET['id'];

            //create sql query to get all other details
            $sql="SELECT * FROM tbl_catagory WHERE id=$id";

            //execute the query
            $res=mysqli_query($conn,$sql);

            //count the rows to check wheather id is valid or not
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                //get all data
                $row=mysqli_fetch_assoc($res);
                $title=$row['title'];
                $current_image=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];
            }
            else
            {
                //redirect to manage catagory with session msg
                $_SESSION['no-catagory-found']="<div class='error'>Catagory not found!</div>";
                //redirect to manage catagory
                header('location:'.SITEURL.'php/manage-catagory.php');

            }

        }
        else
        {
            //redirect to manage category
            header('location:'.SITEURL.'php/manage-catagory.php');
        }
        
        
        ?>
     <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?>"/>
                </td>
            </tr>

            <tr>
                <td>Current Image:</td>
                <td>
                    <?php
                     if($current_image!="")
                     {
                         //dispaly the image
                         ?>
                         <img src="<?php echo SITEURL;?>/image/catagory/<?php echo $current_image?>" width="150px">;
                         <?php

                     }
                     else 
                     {
                         //display msg
                         echo"<div class='error'>Image not Added.</div>";
                     }
                    ?>
                </td>
            </tr>

            <tr>
                <td> New Image:</td>
                <td>
                    <input type="file" name="image" >
                </td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if($featured=="Yes"){ echo "checked";}?> type="radio" name="featured" value="Yes">yes
                    <input  <?php if($featured=="No"){ echo "checked";}?> type="radio" name="featured" value="No">no
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                    <input  <?php if($active=="Yes"){ echo "checked";}?> type="radio" name="active" value="Yes">yes
                    <input <?php if($active=="No"){ echo "checked";}?> type="radio" name="active" value="No">no
                </td>
            </tr>
         <tr>
            <td>
                <input type="hidden" name ="current_image" value="<?php echo $current_image; ?>">
                <input type ="hidden" name ="id"  value="<?php echo $id; ?>">
                <input type="submit" name ="submit" value="Update Catagory" class="btn-danger"/>
             </td>
         </tr>
        </table>
    </form>

    <?php 
    //check for update button
    if(isset($_POST['submit']))
    {
        //echo"clicked";
        //1.get all the values from our form
        $id=$_POST['id'];
        $title=$_POST['title'];
        $current_image=$_POST['current_image'];
        $featured=$_POST['featured'];
        $active=$_POST['active'];
        
        //2.updating new image if selected
        //check weather image is selected or not
        if(isset($_FILES['image']['name']))
        {
            //get the image details
            $image_name=$_FILES['image']['name'];

            //check image is available or not
            if($image_name!="")
            {
                //image available
                //upload the new image

                //A sectionfor autorename of image
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
                  header('location:'.SITEURL.'php/manage-catagory.php');

                  //stop process
                 die();
              }
                // section B remove the current image
                if($current_image!="")
                {
                    $remove_path="../image/catagory/".$current_image;

                    $remove=unlink($remove_path);
    
                    //check weather the img is remove or not and 
                    //if failed to remove the display msg and stop process
                    if($remove==false)
                    {
                        //failed to remove image then
                        $_SESSION['failed-remove']="<div class='error'>Failed to remove cyurrent image.</div>";
                        //redirect to manage catagory
                        header('location:'.SITEURL.'php/manage-catagory.php');
                        die();
                    }
                }
               
            }
            else
            {
                $image_name=$current_image;
            }
        }
        else
        {
             $image_name=$current_image;
        }



        //3.update database
        $sql2="UPDATE tbl_catagory SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
        WHERE id=$id 
        ";
        //execute the query
        $res2 = mysqli_query($conn,$sql2);

        //4redirect to manaage catagory with msg
        //check wether query execute or not

        if($res2==true)
        {
            //update the query
            $_SESSION['update']="<div class='success'>Catagory updated successfully.</div>";
            header('location:'.SITEURL.'php/manage-catagory.php');
        }
        else
        {
            //failed to update the catagory
            $_SESSION['update']="<div class='error'>Failed to update Catagory.<div>";
            header('location:'.SITEURL.'php/manage-catagory.php');
        }

    }
    ?>

 </div>
</div>
<?php
include('partials/footer.php');
?>