




<?php
session_start();

include('connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
    }
    header('Location: login.php');
    exit;
}

if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];
    $user_email = $_SESSION['user_email'];

    // Password doesn't match
    if ($password !== $confirm_password) {
        header('Location: account.php?error=Passwords do not match');
        exit();
    } elseif (strlen($password) < 6) {
        header('Location: account.php?error=Password must be at least 6 characters');
        exit();
    } else {
        $hashed_password = md5($password);
        $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss', $hashed_password, $user_email);

        if ($stmt->execute()) {
            header('Location: account.php?message=Password has been updated successfully');
        } else {
            header('Location: account.php?error=Could not update password');
        }
        exit();
    }
}
//get orders

if(isset($_SESSION['logged_in'])){
    $user_id=$_SESSION['user_id'];
    $stmt=$conn->prepare("SELECT * FROM orders WHERE user_id=?");
    $stmt->bind_param('i',$user_id);
     $stmt->execute();

    $orders=$stmt->get_result();
}

?>



<?php include('layouts/header.php'); ?>

<!----account-->
<section class="my-5 py-5">
    <div class="row container mx-auto">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
        <p class="text-center" style="color:green"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success'];} ?></p>
        <p class="text-center" style="color:green"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success'];} ?></p>
            <h3 class="font-weight-bold">Account info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Name <span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></span></p>
                <p>Email<span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}?></span></p>
                <p><a href="#orders" id="order-btn">Your orders</a></p>
                <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <form id="account-form" method="POST" action="account.php">
                <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){ echo $_GET['message'];} ?></p>
                <h3>Change Password</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="account-password-confirm" name="confirmpassword" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
                </div>
            </form>
        </div>
    </div>
</section>


<!----orders--->
<section id="orders" class="cart container my-5 py-3">
    <div class="orders mt-5">
        <h2 class="font-weight-bold">Orders</h2>
        <hr>
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Order ID</th>
            <th>Order Cost</th>
            <th>Order Status</th>
            <th>Order Date</th>
            <th>Order Details</th>
        </tr>

        <?php  while($row=$orders->fetch_assoc()){?>
        <<tr>
            <td>
                <div class="product-info">
                    <!-- <img src="imgs/le2.jpg"> -->
                    <div>
                        <p class="mt-3"><?php echo $row['order_id'];?></p>
                    </div>
                    
                </div>
                <!-- <span><?php echo $row['order_id'];?></span> -->
            </td>
            <td>
                <span><?php echo $row['order_cost'];?></span>
            </td>
            <td>
                <span><?php echo $row['order_status'];?></span>
            </td>
            <td>
                <span><?php echo $row['order_date'];?></span>
            </td>
            <td>
                <form method="POST" action="order_details.php">
                    <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status"> 
                    <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id">
                   <input class="btn order-details-btn" name="order_details_btn" type="submit" value="details"> 
                </form>
            </td>
        
        </tr>
        <?php } ?>
       
    </table>
   
</section>
 




<!-- ------footer------ -->
<!-- <div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <img src="imgs/logo.png" width="100px">
            </div>
            <div class="footer-col-2">
                <h3>Useful Links </h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                </ul>

            </div>
            <div class="footer-col-3">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>TikTok</li>
                </ul>


            </div>
            <div class="footer-col-4">
                <h3>Contact</h3>
                <ul>
                    <li>Address</li>
                    <li>Contact</li>
                    <li>Email</li>
                </ul>
            </div>
        </div>
    </div>
</div> -->
<div class="end-text">
    <h5>Copyright © @2023. All Rights Reserved.Designed By Rubesh Shrestha</h5>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>