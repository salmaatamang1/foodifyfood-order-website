<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Category</h1>
    <br/><br/><br/>
    <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['no-catagory-found']))
            {
                echo $_SESSION['no-catagory-found'];
                unset($_SESSION['no-catagory-found']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?><br><br>
    <!--butto to add admin-->
    <a href="<?php echo SITEURL;?>php/add-catagory.php" class="btn-primary"> Add Category</a>

    <br/><br/><br/>

<table class="tbl-full">
    <tr>
        <th> S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Action</th>

    </tr>
         <?php
             //query to get allcatagory from database
             $sql="SELECT * FROM tbl_catagory";

             //execute query
             $res=mysqli_query($conn,$sql);

             //count the rows
             $count=mysqli_num_rows($res);

             //createnserial numvariable
             $sn=1;

             //check wheather we have data in database or not
             if($count>0)
             {
                 //we have data in database
                 //get data and display
                 while($row=mysqli_fetch_assoc($res))
                 {
                     $id=$row['id'];
                     $title=$row['title'];
                     $image_name=$row['image_name'];
                     $featured=$row['featured'];
                     $active=$row['active'];
                     ?>
                      <tr>
                          <td><?php echo $sn++?></td>
                          <td><?php echo $title;?></td>

                          <td>
                              <?php
                              //check weather the img name available or not
                              if($image_name!="")
                              {
                                  //display img
                                  ?>
                                  <img src="<?php echo SITEURL;?>image/catagory/<?php echo $image_name; ?>" width="100px">

                                  <?php
                                
                              }
                              else
                              {
                                  //
                                  echo"<div class='error'>Image not added</div>";
                              }
                              ?>
                        </td>

                          <td><?php echo $featured;?></td>
                          <td><?php echo $active;?></td>
                          <td>
                              <a href="<?php echo SITEURL;?>php/update-catagory.php?id=<?php echo $id; ?>" class="btn-secondary">Update Catagory</a>
                              <a href="<?php echo SITEURL;?>php/delete-catagory.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Catatory</a>
                          </td>
                      </tr>

                      
                          <?php

                 }
             }
             else
             {
                //we donot  have data in database  
                //we will display the msy inside the table
                ?> 
                <tr>
                    <td colspan="6"><div class="error">No catagory added.</div></td>
                </tr>

            
                <?php
              }  
                ?> 
      
    </table>

 </div>
</div>
<?php
include('partials/footer.php');
?>