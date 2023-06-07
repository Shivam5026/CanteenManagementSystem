<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        
        <br><br>

        <?php
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>

        <br><br>

        <!--Add category From starts -->
        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Category Title">
                </td>
            </tr>

            <tr>
                <td>Select Image:</td>
                <td>
                  <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Feature: </td>
                <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-add">
                </td>
            </tr>

        </table>
    
        </form>
        <!--Add category From Ends   -->

        <?php
        
            //Check Whether the submit Button is cliked or not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";

                //1. Get the value from category Form
                $title = $_POST['title'];

                //For radio input we need to check whether the button is selected or not
                if(isset($_POST['featured']))
                {
                    //Get the Value from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    //Set the default value
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                
                else
                {
                    $active = "No";
                }

                //Check whether the image is selected or not set the value for image name accordingly
                //print_r($_FILES['image']);

                //die(); // break the code here to see the file selected 
                
                if(isset($_FILES['image']['name']))               //D what is the name of our file name?
                {
                    //Upload the image
                    //To upload image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];

                    //upload the image only if image is selected
                    if($image_name != "")
                    {
                        //Auto rename our image
                        //Get the Extainsion of our image like (jpg, png, gif, etc) e.g "specialfood1.jpg"
                        $ext = end(explode('.',$image_name));

                        //rename the image
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext;  // e.g. Food_CAtegory_834.jpg

                        $source_path = $_FILES['image']['tmp_name'];
                        
                        $destination_path = "../images/category/".$image_name;

                        //Finally upload Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        // And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //set message
                            $_SESSION['upload'] = "<div class='error'>Failed to upload Image.</div>";
                            //Redorect to Add category page
                            header('location:'.SITEURL.'admin/add-category.php');
                            //Stop the process
                            die();
                        }
                    }


                }
                else
                {
                    //Do not upload the image ans set the image name value as blank
                    $image_name="";                    // image value is blank
                }
               //2. Create SQL Query to insert Category into database
               $sql = "INSERT INTO tbl_category SET 
                   title ='$title',
                   image_name='$image_name',
                   featured ='$featured',
                   active ='$active'
                ";

                //3.Execute the query and save in database
                $res = mysqli_query($conn, $sql);

                //4. check whether the query executed or not data added or not
                if($res==true)
                {
                    //Query Executed and category Added
                    $_SESSION['add'] = "<div class='success'>Category Added successfully.</div>";
                    //Redirect to Manage Category page
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //Failed to add category
                    $_SESSION['add'] = "<div class='error'>Failed to Add category.</div>";
                    //Redirect to Manage Category page
                    header('location:'.SITEURL.'admin/add-category.php');

                }
            }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?> 
