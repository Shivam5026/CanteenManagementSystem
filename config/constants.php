<?php
  // start the session
  session_start();
  // creat constant to store non repeting value 
  define('SITEURL', 'http://localhost/food-order/');
  define('LOCALHOST', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSSWORD', '');
  define('DB_NAME', 'food-order');

  $conn = mysqli_connect(LOCALHOST, DB_USERNAME ,DB_PASSSWORD) or die(mysqli_error());//database connection
  $db_select =mysqli_select_db($conn, DB_NAME) or die(mysqli_error());//selecting database
  // This above code stops the repetation of database

?>