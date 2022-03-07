<?php
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage food</h1>

    <br/><br/><br/>


    <?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    } 
        ?>
    <!--butto to add admin-->
    <a href="<?php echo SITEURL;?>php/add-food.php" class="btn-primary"> Add Food</a>

    <br/><br/><br/>

<table class="tbl-full">
    <tr>
        <th> S.N</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Action</th>
    </tr>

    <?php
    //create a sql query to get all the food
    $sql="SELECT * FROM tbl_food";

    //execute the query
    $res=mysqli_query($conn,$sql);

    //count the rows to check we have food or not
    $count=mysqli_num_rows($res);
    //create number variable
    $sn=1;

    if($count>0)
    {
        //value in database
        //get value from db and display
        while($row=mysqli_fetch_assoc($res))
        {
          $id=$row['id'];
          $title=$row['title'];
          $price=$row['price'];
          $image_name=$row['image_name'];
          $featured=$row['featured'];
          $active=$row['active'];
          ?>     
        <tr>
        <td><?php echo $sn++;?></td>
        <td><?php echo $title;?></td>
        <td>  <?php echo $price;?> </td>
        <td>
            <?php
            //check weather we have image or not
            if($image_name=="")
            {
               //we dont have img display error msg
               echo"<div class='error'>Image not added</div>"; 
            }
            else
            {
               ?>
               <img src="<?php echo SITEURL;?>image/food/<?php echo $image_name;?>" width="100px">
               <?php
            }
            
            ?>
        </td>
        <td><?php echo $featured;?></td>
        <td><?php echo $active;?></td>
        <td>
            <a href="#" class="btn-secondary">Update Food</a>
            <a href="<?phpecho SITEURL;?>php/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name?>" class="btn-danger">Delete Food</a>
        </td>
    </tr>
          <?php
        }
    }
    else
    {
       //emptyy database
       echo "<tr><td colspan='7' class='error'>Food not added yet.</td></tr>";
    }

    
    ?>
   

</table>
     </div>
</div>
<?php
include('partials/footer.php');
?>