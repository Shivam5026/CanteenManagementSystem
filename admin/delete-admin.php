<?php
   //include constants.php file here
   include('../config/constants.php');

   //1. get the id of admin to be deleted
   $id = $_GET['id'];
   //2.creat sql query to delet admin
   $sql = "DELETE FROM tbl_admins WHERE id=$id";

   //execute the query 
   $res = mysqli_query($conn, $sql);

   // check whether the querry executed successfully or not
   if($res==TRUE)
   {
      // query executed successfully and admin deleted
     // echo "admin deleted";
     // create session variable to display message
     $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
     //redirect to manage admin page
     header('location:'.SITEURL.'admin/manage-admin.php');
   }
   else
   {
      // fail to delete admin
      // echo "Fail to delet admin";
      $_SESSION['delete'] ="<div class='error'>Failed to delete admin. Try agin later </div>";
      header('location:'.SITEURL.'admin/manage-admin.php');
   }
   //3.redirect to manage admin page with message (success/error)

?>