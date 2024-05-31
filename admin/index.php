<?php include('header.php');?>


<?php
// session_start();

 if(!isset($_SESSION['admin_logged_in'])){
   header('location:login.php');
   exit();
 }



?>

<?php

//        if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
      
//         //if user has already entered page then page number is the one that they selected
//          $page_no=$_GET['page_no'];

//     }else{
//         //if user just entered the page then default page is 1
//         $page_no=1;
//     }


    
 
// //2.return number of products
//     $stmt1=$conn->prepare("SELECT COUNT(*) As total_records FROM orders");
   
//     $stmt1->execute();
//     $stmt1->bind_result($total_records);
//     $stmt1->store_result();
//     $stmt1 ->fetch();


//     //3.product per page

// $total_records_per_page=8;
// $offset=($page_no-1)* $total_records_per_page;

// $previous_page=$page_no-1;
// $next_page=$page_no+1;
// $adjacents="2";
// $total_records_per_page=ceil($total_records/$total_records_per_page);


// //4.get all products
// $stmt2=$conn->prepare("SELECT *FROM orders  LIMIT $offset,$total_records_per_page");

// $stmt2->execute();
// $products=$stmt2->get_result(); -->
 





   
   $stmt=$conn->prepare("SELECT * FROM orders ");
   
    $stmt->execute();

   $orders=$stmt->get_result();


 ?> 



         <div class="content pb-0">
            <div class="orders">

            <?php include('form.php');?>
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Orders </h4>
                           <?php  if(isset($_GET['order_updated'])){ ?>
                           <p class="text-center" style="color:green;"><?php echo $_GET['order_updated']; ?></p>
                           <?php }?>
                           <?php  if(isset($_GET['order_failed'])){ ?>
                           <p class="text-center" style="color:red;"><?php echo $_GET['order_failed']; ?></p>
                           <?php }?>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Order ID</th>
                                       <th>Order Status</th>
                                       <th>User ID</th>
                                       <th>Order Date</th>
                                       <!-- <th>User Phone</th> -->
                                       <th>User Address</th>
                                       <th>Edit</th>
                                       <th>Delete</th>
                               
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach($orders as $order){ ?>
                                    <tr>
                                       <td><?php echo $order['order_id'];?></td>
                                       <td><?php echo $order['order_status'];?></td>
                                       <td><?php echo $order['user_id'];?></td>
                                       <td><?php echo $order['order_date'];?></td>
                                       <!-- <td><?php echo $order['user_phone'];?></td> -->
                                       <td><?php echo $order['user_address'];?></td>
                                       <td><a class="btn btn_primary" href="edit_order.php?order_id=<?php echo $order['order_id'];?>">Edit</a></td>
                                       <td><a class="btn btn_danger">Delete</a></td>






                                       <!-- <td class="serial">1.</td> -->
                                       
                                       <!-- <td> #5469 </td>
                                       <td> <span class="name">Louis Stanley</span> </td>
                                       <td> <span class="product">iMax</span> </td>
                                       <td><span class="count">231</span></td>
                                       <td>
                                          <span class="badge badge-complete">Complete</span>
                                       </td> -->
                                    </tr>


                                    <?php } ?>
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