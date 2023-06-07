<?php include('config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Important to make website responsive-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CanteenAutomationSystem</title>

    <!--Link css File-->
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <!--Navbar Starts here-->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                 <img src="images/logo.png" alt="Canteen Logo" class="img-responsive">
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>admin/login.php">Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>user/user-login.php">User</a>
                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>

    </section>
    <!--Navbar Ends here-->