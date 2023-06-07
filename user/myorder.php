<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">My Orders</h1>

        <br/><br/><br/>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Comment</th>
                <th>Action</th>
                
            </tr>

            <?php 
                //CHeck whether food id is set or not
                if(isset($_SESSION['user_id']))
                {
                    //Get the Food id and details of the selected food
                    $user = $_SESSION['user_id'];



                    

                    //Get the DEtails of the Selected user
                    $sql = "SELECT * FROM tbl_order WHERE customer_contact=$user";
                    //Execute the Query
                    $res = mysqli_query($conn, $sql);
                    //Count the rows
                    $count2 = mysqli_num_rows($res);
                    $sn = 1;
                    //CHeck whether the data is available or not
                    if($count2>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //GEt the Data from Database
                            //$row = mysqli_fetch_assoc($res);
                            $id=$row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $comment=$row['comment'];
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $food; ?></td>
                                    <td>Rs.<?php echo $price; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php echo $order_date; ?></td>

                                    <td>
                                        <?php 
                                            // Ordered, On Delivery, Delivered, Cancelled

                                            if($status=="Ordered")
                                            {
                                                echo "<label style='color:Blue;'>$status</label>";
                                            }
                                            elseif($status=="On Delivery")
                                            {
                                                echo "<label style='color: orange;'>$status</label>";
                                            }
                                            elseif($status=="Delivered")
                                            {
                                                echo "<label style='color: green;'>$status</label>";
                                            }
                                            elseif($status=="Cancelled")
                                            {
                                                echo "<label style='color: red;'>$status</label>";
                                            }
                                        ?>
                                    </td>
                                        <td><?php echo $comment; ?></td>

                                        <td>
                                            <a href="<?php echo SITEURL; ?>user/bill.php?order_id=<?php echo $id; ?>" class="btn btn-primary"> Generate bill </a>
                                        </td>
                                </tr>
                            <?php
                        }
                        
                    }
                    else
                    {
                        //Food not Availabe
                        //REdirect to Home Page
                        header('location:'.SITEURL.'user/');
                    }
                }
                else
                {
                    //Redirect to homepage
                    header('location:'.SITEURL.'user/');
                }
            ?>

            


        </table>
    </div>
    
</div>
<?php include('partials/footer.php'); ?>
