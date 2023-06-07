<?php include('partials/menu.php');?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            
            <?php

                //Display all the categories that are active
                //sql Query
                $sql = "SELECT * FROM tbl_category WHERE active ='YES'";
                
                //Execute the Query
                $res = mysqli_query($conn,$sql);

                //Count rows
                $count = mysqli_num_rows($res);

                //check whether categories available or not
                if($count>0)
                {
                    //categories available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                            <a href = "category-foods.php">
                                <div class = "box-3 float-container">
                                    <?php
                                        if($image_name =="")
                                        {
                                            //Image not available
                                            echo "<div class ='error'>Image not found.</div>";

                                        }
                                        else
                                        {
                                            //image Available
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>    
                        <?php
                    }
                }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



    <?php include('partials/footer.php');?>

</body>
</html>