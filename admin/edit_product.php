<?php include('header.php');  ?>

<?php 

if(isset($_GET['product_id'])){
    $product_id=$_GET['product_id'];
    $stmt=$conn->prepare("SELECT * FROM products WHERE product_id=? ");
    $stmt->bind_param('i',$product_id);
   
    $stmt->execute();

   $products=$stmt->get_result();
}else if(isset($_POST['edit_btn'])){
   $product_id=$_POST['product_id'];
   $title=$_POST['title'];
   $description=$_POST['description'];
   $price=$_POST['price'];
   $color=$_POST['color'];
   $category=$_POST['category'];
        $stmt = $conn->prepare("UPDATE products SET product_name=?,product_description=?,product_price=?,
                                 product_color=?,product_category=? WHERE product_id=?");
        $stmt->bind_param('sssssi',$title,$description,$price,$color,$category,$product_id);
        if($stmt->execute()){
         header('location: products.php?edit_success_message=Product has been updated succesfully');
        }else{
          header('location: products.php?edit_failure_message=Error occured');
        }
    
}else{
    header('products.php');
    exit;
}



?>

<div class="container-fluid">
   <div class="row" style="min-height:1000px">
   <?php include('form.php');?>

   <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
         <h1 class="h2">DashBoard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>

          </div>

      </div>

      <h2>Edit Product</h2>
      <div class="table-responsive">
         <div class="mx-auto container">
            <form id="edit-form" enctype="multipart/form-data" method="POST" action="edit_product.php">
               <p style="color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
               <div class="form-group mt-2">

               <?php foreach($products as $product){?>

                  <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                  <label>Title</label>
                  <input type="text" class="form-control" id="product_name" value="<?php echo $product['product_name']?>" name="title" placeholder="Title">

               </div>
               <div class="form-group mt-2">
                  <label>Description</label>
                  <input type="text" class="form-control" id="product_desc" value="<?php echo $product['product_description']?>" name="description" placeholder="Description">

               </div>
               <div class="form-group mt-2">
                  <label>Price</label>
                  <input type="text" class="form-control" id="product_price" value="<?php echo $product['product_price']?>" name="price" placeholder="Price">

               </div>
               <div class="form-group mt-2">
                  <label>Category</label>
                  <select class="form-select" required name="category">
                     <option value="lehenga">Lehenga</option>
                     <option value="kurtha">Kurhta</option>
                     <option value="saree">Saree</option>
                     <option value="jewellery">Jewellery</option>
                  </select>

               </div>
               <div class="form-group mt-2">
                  <label>Color</label>
                  <input type="text" class="form-control" id="product_color" value="<?php echo $product['product_color']?>" name="color" placeholder="Color" required>

               </div>

               <div class="form-group mt-3">
                  <input type="submit" class="btn btn-primary" name="edit_btn" value="Edit">

               </div>
               <?php }?>
            </form>
         </div>
        </main>


      </div>


   </div>


</div>


<footer class="site-footer">
            <div class="footer-inner bg-white">
               <div class="row">
                  <div class="col-sm-6">
                     Copyright &copy;2023. All Rights Reserved.
                  </div>
                  <div class="col-sm-6 text-right">
                     Designed by Rubesh Shrestha
                  </div>
               </div>
            </div>
         </footer>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>