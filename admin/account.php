<?php
session_start();
include('../connection.php');

if(!isset($_SESSION['admin_logged_in'])){
    header('location:login.php');
    exit;
}

?>



<

<div class="content pb-0">
            <div class="orders">

            <!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Form Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/style.css">
      
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      <style>

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

/* Style the content section */
.content {
  background-color: #f1f1f1;
  padding: 20px;
}

/* Style the admin account details section */
.container p {
  font-size: 18px;
  margin: 5px 0;
}

/* Add styles for the admin account heading */
.h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

/* Add styles for the buttons */
.btn-toolbar {
  margin: 10px 0;
}

.btn-group {
  display: inline-block;
}

.btn {
  background-color: #007bff;
  color: #fff;
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.btn:hover {
  background-color: #0056b3;
}
footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

/* Add styles for the links inside the footer */
footer a {
  color: #fff;
  text-decoration: none;
  transition: color 0.3s;
}

footer a:hover {
  color: #ccc;
}


/* Add any additional styling for your form and other elements as needed */

        </style>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="index.php" >Orders</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="products.php" >Products</a>
                  </li>
				  
                  <li class="menu-item-has-children dropdown">
                     <a href="account.php" >Accounts</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="add_product.php" >Add new Product</a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.php">Vidya's Boutique</a>
                  <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
                  
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php?logout=1"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  
               </div>
            </div>
         </header>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
         <h1 class="h2">Admin Account</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>

          </div>

      </div>
    
      <div class="container">
         <p>ID:<?php echo $_SESSION['admin_id']; ?></p>
         <p>Name:<?php echo $_SESSION['admin_name']; ?></p>
         <p>Email:<?php echo $_SESSION['admin_email']; ?></p>
            
            </div>
            </div>
        
        </main>

</div>
</div>


