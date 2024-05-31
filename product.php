



<?php
session_start();

include('connection.php');

//use search section
// if(isset($_POST['search'])){
//     if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
      
//         //if user has already entered page then page number is the one that they selected
//         $page_no=$GET['page_no'];

//     }else{
//         //if user just entered the page then default page is 1
//         $page_no=1;
//     }
//     $category=$_POST['category'];
//     $price=$_POST['price'];
//     //2.return number of products
//     $stmt1=$conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price<=?");
//     $stmt1->bind_param('si',$category,$price);
//     $stmt1->execute();
//     $stmt1->bind_result($total_records);
//     $stmt1->store_result();
//     $stmt1->fetch();



//      $total_records_per_page=8;
//      $offset=($page_no-1)* $total_records_per_page;

//     $previous_page=$page_no-1;
//     $next_page=$page_no+1;
//     $adjacents="2";
//     $total_records_per_page=ceil($total_records/$total_records_per_page);


//     $stmt2=$conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT $offset,$total_records_per_page");

//     $stmt2->execute();
//     $products=$stmt2->get_result();


// }else{

//     if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
      
//         //if user has already entered page then page number is the one that they selected
//         $page_no=$GET['page_no'];

//     }else{
//         //if user just entered the page then default page is 1
//         $page_no=1;
//     }

// //2.return number of products
//     $stmt1=$conn->prepare("SELECT COUNT(*) As total_records FROM products ");
//     $stmt1->execute();
//     $stmt1->bind_result($total_records);
//     $stmt1->store_result();
//      $stmt1 ->fetch();


//     //3.product per page

//     $total_records_per_page=8;
//      $offset=($page_no-1)* $total_records_per_page;

//     $previous_page=$page_no-1;
//     $next_page=$page_no+1;
//     $adjacents="2";
//     $total_records_per_page=ceil($total_records/$total_records_per_page);


// //4.get all products
//    $stmt2=$conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");

//    $stmt2->execute();
//    $products=$stmt2->get_result();

// }



// // return all products
// }else{
       
//     //1. determine page no 
//           if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
      
// //         //if user has already entered page then page number is the one that they selected
//          $page_no=$_GET['page_no'];

//       }else{
//          //if user just entered the page then default page is 1
//          $page_no=1;
//      }


// //     //2.return number of products
//     $stmt1=$conn->prepare("SELECT COUNT(*) As total_records FROM products");
//     $stmt1->execute();
//     $stmt1->bind_result($total_records);
//     $stmt1->store_result();
//     $stmt1->fetch();

// //     //3.product per page

//    $total_records_per_page=8;
//    $offset=($page_no-1)* $total_records_per_page;

//    $previous_page=$page_no-1;
//    $next_page=$page_no+1;
//    $adjacents="2";
//    $total_records_per_page=ceil($total_records/$total_records_per_page);

//        $stmt=$conn->prepare("SELECT * FROM products ");
//        $stmt->execute();
    
//     $products=$stmt->get_result();
// }


 $stmt=$conn->prepare("SELECT * FROM products ");
     $stmt->execute();
    
   $products=$stmt->get_result(); 


?>




<?php include('layouts/header.php'); ?>
<!----search-->
 <!-- <section id="search" class="my-5 py-5 ms-2">
    <div class="container mt-5 py-5">
        <p>Search Products</p>
        <hr>

    </div>
    <form action="product.php" method="POST">
        <div class="row mx-auto container">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <p>Category</p>
                <div class="form-check">
                    <input class="form-check-input" value="lehenga" type="radio" name="category" id="category_one" >
                    <label class="form-check-label" for="flexRadioDefault1">
                        Lehenga
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="saree" type="radio" name="category" id="category_two" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Saree
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="kurtha" type="radio" name="category" id="category_three" checked>
                    <label class="form-check-label" for="flexRadioDefault3">
                        Kurtha
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="jewellery" type="radio" name="category" id="category_four">
                    <label class="form-check-label" for="flexRadioDefault4">
                        Jewellery
                    </label>
                </div>

            </div>

        </div>
        <div class="row mx-auto container mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p>Price</p>
                <input type="range" class="form-range w-50" name="price" value="//" min="1" max="20000" id="customRange2">
                <div class="w-50">
                    <span style="float:left;">1</span>
                    <span style="float:right;">20000</span>

                </div>

            </div>

        </div>
        <div class="form-group my-3 mx-3">
            <input type="submit" name="search" value="Search" class="btn btn-primary">
        </div>
    </form>

</section> -->
<!-----Shop-->
    <section id="featured" class="my-5 ">
        <div class="container  mt-5 py-5">
            <h3> Our Products</h3>
            <hr>
            <p>Here You Can Check out our new Products</p>
        </div>
        <div class="row mx-auto container-fluid">

            <?php while($row=$products->fetch_assoc()){?>
            <div  onlick="window.location.href='single_product.php';"  class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/<?php echo $row['product_image'];?>">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php  echo $row['product_name'];?></h5>
                <h5 class="p-price">Rs.<?php echo $row['product_price']?></h5>
                <a class="btn product-buy-btn" href="<?php  echo "single_product.php?product_id=".$row['product_id'];?>">Buy Now</a>
            </div>

            <?php }?>
             
          
       
            </ul>
         </nav>   
        </div>
    </section>














    <!-- <section id="featured" class="my-5 ">
        <div class="container text-center mt-5 py-5">
            <h3>Kurtha</h3>
            <hr>
            <p>Here You Can Check out our new Kurtha Products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/ke2.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">White Kurtha</h5>
                <h5 class="p-price">Rs.5000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/ke3.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Party Kurtha</h5>
                <h5 class="p-price">Rs.10000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/ke4.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Casual Kurtha</h5>
                <h5 class="p-price">Rs.4000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/ke5.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Kurtha set</h5>
                <h5 class="p-price">Rs.6000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <nav aria-label="Page naavigation">
                <ul class="pagination mt-5">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
             </nav> 
        </div>
    </section>
    <section id="featured" class="my-5 ">
        <div class="container text-center mt-5 py-5">
            <h3>Saree</h3>
            <hr>
            <p>Here You Can Check out our new Saree Products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/se2.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Burgundy Saree</h5>
                <h5 class="p-price">Rs.8000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/se3.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Party Saree</h5>
                <h5 class="p-price">Rs.15000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/se4.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Blue Saree</h5>
                <h5 class="p-price">Rs.10000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/se5.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Dual Shade Saree</h5>
                <h5 class="p-price">Rs.16000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <nav aria-label="Page naavigation">
                <ul class="pagination mt-5">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
             </nav> 
        </div>
    </section>
    <section id="featured" class="my-5 ">
        <div class="container text-center mt-5 py-5">
            <h3>Jewellery</h3>
            <hr>
            <p>Here You Can Check out our new Jewellery Products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/je2.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Necklace Set</h5>
                <h5 class="p-price">Rs.5000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/je3.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Ear ring</h5>
                <h5 class="p-price">Rs.5000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/je4.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Bangel</h5>
                <h5 class="p-price">Rs.2000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="imgs/je5.jpg">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Light Necklace Set</h5>
                <h5 class="p-price">Rs.3000</h5>
                <button class="buy-btn">Buy Now</button>
            </div>
            <nav aria-label="Page naavigation">
                <ul class="pagination mt-5">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
             </nav> 
        </div>
    </section> -->
    <!----footer-->
    <?php include('layouts/footer.php'); ?>   