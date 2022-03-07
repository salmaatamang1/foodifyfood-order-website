<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add food.</h1>
        <br><br>

        <?php
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        } 
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                  <td>Title:</td>
                  <td>
                      <input type="text" name="title" placeholder="Title of the food">
                  </td>
            </tr>

            <tr>
                  <td>Description:</td>
                  <td>
                      <textarea name="description" cols="30" rows="10" placeholder="Description of the Food"></textarea>
                  </td>
            </tr>

            <tr>
                  <td>Price:</td>
                  <td>
                      <input type="number" name="price">
                  </td>
            </tr>

            <tr>
                <td>Select Image:</td>
                  <td>
                      <input type="file" name="image">
                  </td>
            </tr>

            <tr>
                  <td>Catagory:</td>
                  <td>
                      <select name="catagory">

                      <?php
                          //create the php to display catagories from database
                          //1.create sql query to get all active catagories
                          $sql="SELECT * FROM tbl_catagory WHERE active='Yes'";

                           //executing query
                          $res=mysqli_query($conn,$sql);

                          //count rows to check weather we have catagories or not
                          $count=mysqli_num_rows($res);

                          //check for count is greater than zero we have catagories else not 
                          if($count>0)
                          {
                              //we have catagories
                              while($row=mysqli_fetch_assoc($res))
                              {
                                  //get the value of catagory
                                  $id=$row['id'];
                                  $title=$row['title'];
                                  ?>

                                   <option value="<?php echo $id;?>"><?php echo $title;?></option>

                                  <?php
                              }

                          }
                          else
                          {
                              //we donot have catagory
                              ?>
                               <option value="0">No catagories found.</option>
                              <?php
                          }
                          //2.display on dropdown
                      
                      ?>
                      </select>
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
                    <input type="submit" name="submit" value="AddFood" class="btn-danger">
                </td>
            </tr>
            

            </table>

        </form>

        <?php
        //check weather the btn clicked or not
        if(isset($_POST['submit']))
        {
            //we will add food in database
            //echo"clicked";
            //1.get data from from
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $catagory=$_POST['catagory'];

            //check radio btn are checked or not
            if(isset($_POST['featured']))
            {
                $featured=$_POST['featured'];
            }
            else{
                $featured=" No";
            }
            if(isset($_POST['active']))
            {
                $active=$_POST['active'];
            }
            else{
                $active=" No";
            }
            
            

            //2 upload the img
            //checked weather the select img is clicked or not upload the img only if it is selected
            if(isset($_FILES['image']['name']))
            {
                //get the details of the selected
                $image_name=$_FILES['image']['name'];

                //check wather the img selected or not and upload the image
                if($image_name!="")
                {
                    //img selected
                    //A.rename the img
                    //get the exension of selected img
                    $ext=end(explode('.',$image_name));
                    //new name for img
                    $image_name="Food-Name-".rand(0000,9999).".".$ext;//new image name for added one
                    //B.upload the img
                    //get the source and destination path
                    //sourcepath is the current location of img
                    $src=$_FILES['image']['temp_name'];
                    //get destionation path for img to be uploaded
                    $dst='../image/food/'.$image_name;
                    //finally upload food img
                    $upload=move_uploaded_file($src,$dst);
                    //check image uploaded or not
                    if($upload==false)
                    {
                        //fail to upload img and redirect to add food with msg and stop process
                        $_SESSION['upload']="<div class='error'>Fail to upload image.</div>";
                        header('location:'.SITEURL.'php/add-food.php');
                        die();

                    }
                }

            }
            else
            {
                  $image_name="";//setting default value as blank
            }

            //3.insert into database
            //create the sql query to save data in DB
            $sql2 = "INSERT INTO tbl_food (title,description,price,image_name,catagory_id,featured,active)
            VALUES('$title','$description',$price,'$image_name',$catagory,'$featured','$active')";
            //execute query
            $res2=mysqli_query($conn,$sql2);

            //4.redirect with msg in manage food page
            //check data inserted or not
            if($res2==true)//data inserted succesfully
            {
                $_SESSION['add']="<div class='success'>Food added successfully.</div>";
                header('location:'.SITEURL.'php/manage-food.php');
            }
            else
            {
                //failed to insert daaaaaaaata
                $_SESSION['add']="<div class='error'>Failed to add food..</div>";
                header('location:'.SITEURL.'php/manage-food.php');

            }

            
        }
        ?>

    </div>
</div>
<?php
include('partials/footer.php');
?>