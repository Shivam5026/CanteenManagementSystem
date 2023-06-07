<?php
    include('../config/constants.php');
    //Exit the Session
    session_destroy();//unsets $_SESSION['user']

    //Redirect to login page
    header('location:'.SITEURL.'user/user-login.php');
?>