<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">My bill</h1>

        <br/><br/><br/>
        <table class="tbl-full">
            <tr>
                <th>S.no.</th>
                <th>Bill_no.</th>
                <th>Order_no.</th>
                <th>bill_date</th>
                <th>Action</th>
                
            </tr>

            <?php 
                //CHeck whether food id is set or not
                if(isset($_GET['order_id']))
                {
                    //Get the Food id and details of the selected food
                    $order_id = $_GET['order_id'];

                    //Get the DEtails of the SElected Food
                    $sql = "SELECT * FROM tbl_order WHERE id=$order_id";
                    //Execute the Query
                    $res = mysqli_query($conn, $sql);
                    //Count the rows
                    $count = mysqli_num_rows($res);
                    //CHeck whether the data is available or not
                    $sn = 1;
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //GEt the Data from Database
                            $bill_no = $row['id'];
                            $order_no = $row['order_no'];
                            $bill_date = $row['order_date'];
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $bill_no; ?></td>
                                    <td><?php echo $order_no; ?></td>
                                    <td><?php echo $bill_date?></td>
                                    


                                    <td>
                                        <a href="<?php echo SITEURL; ?>user/payscript.php?order_id=<?php echo $bill_no; ?>" class="btn btn-primary"> Paynow </a>
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

<?php include('partials/footer.php');?>