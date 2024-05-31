<?php
session_start();
include('../connection.php');

if(isset($_SESSION['admin_logged_in'])){
    header('location:index.php');
    exit;
}

if(isset($_POST['login_btn'])){

    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $stmt=$conn->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins WHERE admin_email=? AND admin_password=? LIMIT 1");
    $stmt->bind_param('ss',$email,$password);
    if($stmt->execute()){

        $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
        $stmt->store_result();
        if($stmt->num_rows()==1){
            $stmt->fetch();

            $_SESSION['admin_id']=$admin_id;
            $_SESSION['admin_name']=$admin_name;
            $_SESSION['admin_email']=$admin_email;
            $_SESSION['admin_logged_in']=true;

            header('location:index.php?login_success=logged in successfully');
           
        }else{
            header('location:login.php?error=could not verify your account');
           

        }

    }else{
        //error
        header('location:login.php?error=something went wrong');

    }
}



?>





<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form id="login-form" enctype="multipart/form-data" method="POST" action="login.php">
                     <p style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                   

                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="product-name"  name="email" placeholder="Email">
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="product-desc" name="password" placeholder="Password">
                     </div>
                     <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login_btn">Login</button>
					</form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>