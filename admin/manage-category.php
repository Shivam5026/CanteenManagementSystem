<?php include('partials/menu.php'); ?>

        <!-- Main Content Section starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Category</h1>

                <br/>
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
                    if(isset($_SESSION['no-category-found']))
                    {
                        echo $_SESSION['no-category-found'];
                        unset($_SESSION['no-category-found']);
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
                    if(isset($_SESSION['failed-remove']))
                    {
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                    }

    
                ?>
                <br/><br/><br/>
                
                <!--button to add category-->
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-add">Add Category</a>

                <br/><br/><br/>
                <table class="tbl-full">
                    <tr>
                        <th>S.No.</th>
                        <th>Title</th>                             
                        <th>Image</th>
                        <th>Feature</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query to Get all Category from database
                        $sql = "SELECT * FROM tbl_category";

                        //Execute query
                        $res = mysqli_query($conn, $sql);

                        //Count rowws
                        $count = mysqli_num_rows($res);

                        //create serial number variable and assign value as 1
                        $sn=1;

                        // check weather we have data in database or not
                        if($count>0)
                        {
                            //We have data in database
                            //get the data and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++; ?>. </td>
                                            <td><?php echo $title; ?></td>

                                            <td>

                                                <?php
                                                    // Check Whether image is available or not
                                                    if($image_name!="")
                                                    {
                                                        //then Display the image
                                                        ?>

                                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" >
                                                        
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        //then the message
                                                        echo "<div class='error'>Image not Addeded.</div>";
                                                    }
                                                ?>

                                            </td>

                                            <td><?php echo $featured; ?></td>
                                            <td><?php echo $active; ?></td>
                                            <td></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-update">Update Category</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-delete">Delete Category</a>
                                            </td>
                                        </tr>

                                    <?php
                                }
                        }                          
                        else
                        {
                            //we do not hava data
                            // we will display message in table
                            // breaked the php
                            ?>  
                                <tr>
                                    <td colspan="6"><div class="error"> No Category Added.</div></td>
                                </tr>

                            <?php
                        }
                    ?>
                </table>

                
            </div>
        </div>
        <!-- Main Content Section ends -->

<?php include('partials/footer.php'); ?>