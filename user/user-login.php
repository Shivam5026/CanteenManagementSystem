<?php include("../config/constants.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Important to make website responsive-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Canteen Automation System</title>

    <!--Link css File-->
    <link rel="stylesheet" href="../css/admin.css"> 
</head>
<body>
    <div class="login">
        <div class="center">
        <h1>Login</h1>
        <br/>
        <?php
            
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
        <br/>    
        <form action="" method="POST">
            <div class="txt_field">
                <input type="text" name="username"required>
                <label>Username</lable>
                </div>
                <div class="txt_field">
                <input type="password" name="password"required>
                <label>Password</lable>
                </div>
            <div class="pass">
                Forgot Password? 
            </div>
                <input type="submit" name="submit" value="Login" class="btn-login">
                   <div class="register_link">
                        Not a User? <a href="register.php">RegisterHere</a>
                   </div>
        </form>
    </div>
</body>
</html>

<?php
    //Check Submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Login
        //get the data from login Form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //sql query to check user and pass exist or not
        $sql = "SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //count rows to check whether the the user exists or not

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User Exists & success
            $_SESSION['login'] = "<div class='success text-center'>Welcome</div>";
            $_SESSION['user'] = $username;//to check the user is logged in or not and will unset it
            //Redirect to Home Page
            header('location:'.SITEURL.'user/');
        }
        else
        {
            //User not Exists & fail
            $_SESSION['no-login-message'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //Redirect to Home Page
            header('location:'.SITEURL.'user/user-login.php');
        }
    }
?>  