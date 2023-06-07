<?php include("../config/constants.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registration - Canteen Automation System</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <script defer src="validation.js"></script>
</head>
<body>
    <div class="login">
        <div class="center">
            <h1>Registration</h1>
            <h3 class="text-center">Welcome</h3>
            <br/>
            <?php
                if(isset($_SESSION['register']))
                {
                    echo $_SESSION['register'];
                    unset($_SESSION['register']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        <br/>   
                <form id="form" action="" method="POST">
                    <div class="txt_field">
                        <input type="text" id="name" name="name" class="input-responsive" required>
                        <label>Full Name</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" id="username" name="username" class="input-responsive" required>
                        <label>Username</label>
                    </div>    
                    <div class="txt_field">
                        <input type="password" id="password" name="password"  class="input-responsive" required>
                        <label>Password</label>
                    </div>
                    <div class="txt_field">
                        <input type="tel" name="phone" class="input-responsive" class="input-responsive" required>
                        <label>Phone Number</label>
                    </div>
                    
                    <input type="submit" name="submit" value="Save" class="btn-login">
                    <div class="register_link">
                        Already have an account? <a href="user-login.php">ClickHere</a>
                   </div>
                </div>
                </form>
        </div>
    </div>  
   

</body>
</html>
<?php
    //Check Submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //REGISTRATION
        //get the data 
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $ph_num = $_POST['phone'];

       
        $sql ="INSERT INTO tbl_customer SET
        name = '$name',
        username ='$username',
        password ='$password',
        ph_num ='$ph_num'";

        //execute the query
        $res = mysqli_query($conn, $sql);

        
        if($res==TRUE)
        {
            //success
            $_SESSION['register'] = "<div class='success text-center'>You are registered Successfully.</div>";
            //Redirect to Home Page
            header('location:'.SITEURL.'user/register.php');
        }
        else
        {
            //User not Exists & fail
            $_SESSION['register'] = "<div class='error text-center'>Failed to register</div>";
            //Redirect to Home Page
            header('location:'.SITEURL.'user/register.php');
        }    
      }
?>