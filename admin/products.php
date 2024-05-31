<?php include('header.php');?>


<?php


 if(!isset($_SESSION['admin_logged_in'])){
   header('location:login.php');
   exit();
 }



?>

<?php

       if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
      
//         //if user has already entered page then page number is the one that they selected
         $page_no=$_GET['page_no'];

    }else{
        //if user just entered the page then default page is 1
        $page_no=1;
    }


    
 
// //2.return number of products
    $stmt1=$conn->prepare("SELECT COUNT(*) As total_records FROM orders");
   
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1 ->fetch();


//     //3.product per page

$total_records_per_page=8;
$offset=($page_no-1)* $total_records_per_page;

$previous_page=$page_no-1;
$next_page=$page_no+1;
$adjacents="2";
$total_records_per_page=ceil($total_records/$total_records_per_page);


// //4.get all products
$stmt2=$conn->prepare("SELECT *FROM orders  LIMIT $offset,$total_records_per_page");

$stmt2->execute();
$products=$stmt2->get_result();
 





   
   $stmt=$conn->prepare("SELECT * FROM products ");
   
    $stmt->execute();

   $products=$stmt->get_result();


 ?> 



         <div class="content pb-0">
            <div class="orders">

            <?php include('form.php');?>
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Products </h4>
                           <?php  if(isset($_GET['edit_success_message'])){ ?>
                           <p class="text-center" style="color:green;"><?php echo $_GET['edit_success_message']; ?></p>
                           <?php }?>
                           <?php  if(isset($_GET['edit_failure_message'])){ ?>
                           <p class="text-center" style="color:red;"><?php echo $_GET['edit_failure_message']; ?></p>
                           <?php }?>


                           <?php  if(isset($_GET['deleted_failure'])){ ?>
                           <p class="text-center" style="color:red;"><?php echo $_GET['deleted_failure']; ?></p>
                           <?php }?>
                           <?php  if(isset($_GET['deleted_successfully'])){ ?>
                           <p class="text-center" style="color:green;"><?php echo $_GET['deleted_successfully']; ?></p>
                           <?php }?>
                           <?php  if(isset($_GET['product_created'])){ ?>
                           <p class="text-center" style="color:green;"><?php echo $_GET['product_created']; ?></p>
                           <?php }?>

                           <?php  if(isset($_GET['product_failed'])){ ?>
                           <p class="text-center" style="color:red;"><?php echo $_GET['product_failed']; ?></p>
                           <?php }?>
                           <?php  if(isset($_GET['images_updated'])){ ?>
                           <p class="text-center" style="color:green;"><?php echo $_GET['images_updated']; ?></p>
                           <?php }?>

                           <?php  if(isset($_GET['images_failed'])){ ?>
                           <p class="text-center" style="color:red;"><?php echo $_GET['images_failed']; ?></p>
                           <?php }?>
                        </div>
                        
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Product ID</th>
                                       <th>Product Image</th>
                                       <th>Product Name</th>
                                       <th>Product Price</th>
                                       
                                       <th>Product Category</th>
                                       <th>Product Color</th>
                                       <th>Edit Images</th>
                                       <th>Edit</th>
                                       <th>Delete</th>
                               
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach($products as $product){ ?>
                                    <tr>
                                       <td><?php echo $product['product_id'];?></td>
                                       <td><img src="<?php  echo "../imgs/".$product['product_image'];?>" style="width:70px; height 70px"></td>
                                       <td><?php echo $product['product_name'];?></td>
                                       <td><?php echo "Rs.".$product['product_price'];?></td>
                                       <td><?php echo $product['product_category'];?></td>
                                       <td><?php echo $product['product_color'];?></td>
                                       <td><a class="btn btn_warning" href="<?php echo "edit_images.php?product_id=".$product['product_id']."&product_name=".$product['product_name']; ?>">Edit images</a></td>
                                       <td><a class="btn btn_primary" href="edit_product.php?product_id=<?php echo $product['product_id']; ?>">Edit</a></td>
                                       <td><a class="btn btn_danger" href="delete_product.php?product_id=<?php echo $product['product_id']; ?>">Delete</a></td>
                                    </tr>


                                    <?php } ?>
                                    <nav aria-label="Page navigation example" class="mx-auto">
                                       <ul class="pagination mt-5 mx-auto">
                                       <li class="page-item<?php if ($page_no <= 1) { echo ' disabled'; } ?>">
                                           <a class="page-link" href="<?php if ($page_no <= 1) { echo '#'; } else { echo "?page_no=" . ($page_no - 1); } ?>">Previous</a>
                                       </li>
                                          <li class="$page-item"><a class="page-link" href="?page_no=1">1</a></li>
                                          <li class="$page-item"><a class="page-link" href="?page_no=2">2</a></li>
                                          <?php if ($page_no >= 3) { ?>
                                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                                             <li class="page-item"><a class="page-link" href="<?php echo "?page_no=" . $page_no; ?>"><?php echo $page_no; ?></a></li>
                                            <?php } ?>
                                           <li class="page-item <?php if($page_no>= $total_no_of_pages){echo 'disabled';} ?>"> 
                                           <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) {echo '#';} else {echo "?page_no=" . ($page_no + 1);} ?>">Next</a>

                                    </nav>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
		  </div>
         <div class="clearfix"></div>
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