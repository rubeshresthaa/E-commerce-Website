
<?php


/*

on_hold
paid
shipped
delieverd
*/
include('connection.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];
    $order_status=$_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id=?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();

    $order_details = $stmt->get_result();

    $order_total_price=calculateTotalOrderPrice($order_details);

} else {
    header('location: account.php');
    exit;
}

function calculateTotalOrderPrice($order_details){
    // $_SESSION['total'] = 0;
    $total=0;
    foreach($order_details as $row){
        $product_price=$row['product_price'];
        $product_quantity=$row['product_quantity'];
        $total=$total + ($product_price * $product_quantity);
    }
    
    return $total;
}

?>


<?php include('layouts/header.php'); ?>
<!-----Order Details--->
<section id="orders" class="cart container my-5 py-3">
    <div class="orders mt-5">
        <h2 class="font-weight-bold">Order Details</h2>
        <hr>
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>

        <?php foreach( $order_details as $row){ ?>

      
        <tr>
            <td>
                <div class="product-info">
                    <img src="imgs/<?php echo $row['product_image']; ?>">
                    <div>
                        <p class="mt-3"><?php echo $row['product_name']; ?></p>
                    </div>
                    
                </div>
            </td>
            <td>
                <span>Rs.<?php echo $row['product_price']; ?></span>
            </td>
            <td>
                <span><?php echo $row['product_quantity']; ?></span>
            </td>
            
             <!-- <td>
                <form>
                   <input class="btn order-details-btn" type="submit" value="details"> 
                </form>
            </td> -->
        
        </tr>
       <?php } ?> 
       
    </table>
     <?php 
      if($order_status == "on_hold"){?>
      <form style="float:right;" method="POST" action="payment.php">
      <input type="hidden" name="order_total_price" value="<?php echo $order_total_price ;?>">
      <input type="hidden" name="order_status" value="<?php echo $order_status;?>">
      <input type="submit" name="order_pay_btn" class="btn btn-pay" value="Pay Now">

      </form>
    
   <?php }?>
   
</section>

<!-- ------footer------ -->
<?php include('layouts/footer.php'); ?>