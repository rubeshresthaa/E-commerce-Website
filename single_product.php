<?php include('layouts/header.php'); ?>

<?php
 include('connection.php');

 if(isset($_GET['product_id'])) {
   $product_id=$_GET['product_id'];


    $stmt=$conn->prepare("SELECT * FROM products WHERE  product_id= ?");
     $stmt->bind_param("i",$product_id);
    $stmt->execute();
 
    $product = $stmt->get_result();
   //no product id was given 
 }else{
    header('location: index.php');

 }


?>


<!----single product-->
<section class="container single-product my-5 pt-5">
    <div class="row mt-5">

        <?php  while($row=$product->fetch_assoc()) { ?>

     
      <div class="col-lg-5 col-md-6 col-sm-12">
      <img class="img-fluid w-100 pb-1" src="imgs/<?php echo $row['product_image']; ?>" id="mainImg">
        <div class="small-img-group">
            <div class="small-img-col">
                <img src="imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
                <img src="imgs/<?php echo $row['product_image1']; ?>" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
                <img src="imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
                <img src="imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
                <img src="imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img">
            </div>
        </div>
      </div>
      
      <div class="col-lg-6 col-md-12 col-12">
        <h3>Party Wear Lehenga</h3>
        <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
        <h2>Rs.<?php echo $row['product_price']; ?></h2>
        <form method="POST" action="cart.php">
         <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">   
        <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
        <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
        <input type="number" name="product_quantity" value="1">
        <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
        </form>
        
        <h4 class="mt-5 mb-5">Product Details</h4>
        <span><?php echo $row['product_description']; ?>
        </span>
      </div>
    
      <?php } ?>
    </div>
</section>

<!---related products-->
<section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Related Products</h3>
        <hr class="mx-auto">
        
    </div>
    <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="imgs/le2.jpg">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Bollywood Style Lehenga</h5>
            <h5 class="p-price">Rs.15000</h5>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="imgs/le3.jpg">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Morden Lehenga</h5>
            <h5 class="p-price">Rs.8000</h5>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="imgs/le4.jpg">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Burgundy Lehenga</h5>
            <h5 class="p-price">Rs.4000</h5>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="imgs/le5.jpg">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Wedding Lehenga</h5>
            <h5 class="p-price">Rs.5000</h5>
            <button class="buy-btn">Buy Now</button>
        </div>
    </div>
</section>







<!-- ------footer------ -->
<div class="footer">
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
</div>
<div class="end-text">
    <p>Copyright © @2023. All Rights Reserved.Designed By Rubesh Shrestha</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
  var mainImg=  document.getElementById("mainImg");
  var smallImg= document.getElementsByClassName("small-img");

 for(let i=0; i<4; i++){
    smallImg[i].onclick=function(){
    mainImg.src=smallImg[i].src;
}

 }

</script>
</body>
</html>