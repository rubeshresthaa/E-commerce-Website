<?php include('layouts/header.php'); ?>



<!-- 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Vidya'Boutique</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active"  href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Products</a>
                </li>
                <li class="nav-item">
                    <a href="cart.php"><i class="fas fa-shopping-bag"></i></a>
                    <a href="account.php"><i class="fas fa-user"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>-->

<!-----Home-->
<section id="home">
    <div class="container">
        <h5>NEW ARRIVALS</h5>
        <h1><span>Best Prices</span> This Season</h1>
        <p>Shop offer the best products for the most affordable price</p>
        <!-- <img src="imgs/boutique.jpg" alt=""> -->
        <button>Shop Now</button>
    </div>
</section>
<section id="new" class="w-100">
    <div class="row p-5 m-0">
        <!-----one-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="imgs/cat-3.png" alt="">
            <div class="details">
                <h2>Lehenga</h2>
                <button class="text-uppercase">Shop now</button>
            </div>
        </div>
       <!----two-->
       <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="imgs/cat-2.jpg" alt="">
        <div class="details">
            <h2>Saree</h2>
            <button class="text-uppercase">Shop now</button>
        </div>
    </div>
       <!---three--> 
       <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="imgs/cat-1.jpg" alt="">
        <div class="details">
            <h2>Kurtha</h2>
            <button class="text-uppercase">Shop now</button>
        </div>
    </div>
    </div>
</section>
<!----featured-->
<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Our Featured Product</h3>
        <hr>
        <p>Here You Can Check out our new Featured Products</p>
    </div>
    <div class="row mx-auto container-fluid">
    

        
<?php include('get_featured_products.php'); ?>

<?php while($row=$featured_products->fetch_assoc()) { ?>
     <div class="product text-center col-lg-3 col-md-4 col-sm-12">
     <img class="img-fluid mb-3" src="imgs/<?php echo $row['product_image'];?>">
     <div class="star">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
     </div>
     <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
     <h5 class="p-price">Rs.<?php echo $row['product_price']; ?></h5>
     <a href="single_product.php?product_id=<?php echo$row['product_id'];?>"><button class="buy-btn">Buy now</button></a>
 </div>
   <?php } ?>
    </div>
</section>
<!----clothes-->
<section id="featured" class="my-5 ">
    <div class="container text-center mt-5 py-5">
        <h3>Lehenga</h3>
        <hr>
        <p>Here You Can Check out our new Lehenga Products</p>
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
<section id="featured" class="my-5 ">
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
    </div>
</section>

<!-- ------footer------ -->



<?php include('layouts/footer.php'); ?>