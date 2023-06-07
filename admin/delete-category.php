<?php
include('../config/constants.php');
    //echo "delete Page";
    //check whether the id and image_name value is set or not
    if (isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and Delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file available
        if($image_name != "")
        {
            //Image is available so remove it
            $path = "../images/category/".$image_name;
            //Remove the Image
            $remove = unlink($path);

            //If failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Image.</div>";
                //Redirect to manage category page
                header('location'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
        }
        //Delete Data from database
        //sql query to delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //check whether the data is deleted from database or not
        if($res==true)
        {
            //set success message
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');

        }
        else
        {
            //set fail message
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');

        }
        //Redirect to manage category page with message
    }
    else
    {
        //redirect to Manage Category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>