<?php include('layouts/header.php'); ?>


<?php

include('connection.php');
    //if user has already registered, then take user to account page
if(isset($_SESSION['logged_in'])){
    header('location:account.php');
    exit;
}

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Password doesn't match
    if($password !== $confirmpassword){
        header('Location: register.php?error=Password does not match');
        exit();
    }

    // Password is less than 6 characters
    if(strlen($password) < 6){
        header('Location: register.php?error=Password must be at least 6 characters');
        exit();
    }

    // Check whether there is a user with this email or not
    $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email = ?");
    $stmt1->bind_param('s', $email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();

    // If there is a user already registered
    if($num_rows != 0){
        header('Location: register.php?error=User already exists');
        exit();
    } else {
        // Create a new user
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $name, $email, md5($password));

        if($stmt->execute()){
            $user_id=$stmt->insert_id;
            $_SESSION['user_id']=$user_id;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['logged_in'] = true;
            header('Location: account.php?register_success=You registered successfully');
            exit();
        } else {
            header('Location: register.php?error=Could not create an account at the moment');
            exit();
        }
    }
}
?>





    <!----Register-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
            <p style="color: red;"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></p>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email"
                        required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password"
                        placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmpassword"
                        placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" name ="register" value="Register">
                </div>
                <div class="form-group">
                    <h5>Do you have an account?<a id="login-url" href="login.php" class="btn">Login</a></h5>
                </div>
            </form>
        </div>
    </section>




    <!-- ------footer------ -->
    <?php include('layouts/footer.php'); ?>