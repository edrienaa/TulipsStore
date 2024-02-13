<?php
    session_start();
    include './assets/connection.php';
    include './functions/common-function.php';

    if (isset($_POST['register'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        //if password dont match
        if ($password !== $confirmpassword) {
            header('location: customer-login.php?error=password dont match');
        
        //if password is less than 6 char
        }else if (strlen($password) < 6) {
            header('location: customer-login.php?error=password must be at least 6 characters');
        

        //if there is no error 
        }else{
            //check whether there is a user with this email or not
            $stmt1 = $connection->prepare("SELECT count(*) FROM customers WHERE user_email=?");
            $stmt1->bind_param("s", $email);
            $stmt1->execute();
            $stmt1->bind_result($num_rows);
            $stmt1->store_result();
            $stmt1->fetch();

            //if there is a user already register with this email
            if($num_rows != 0){
                header('location: customer-login.php?error=user with this email already exists');

                // if no user register with this email before
            }else{
                //create a new user
                $stmt = $connection->prepare("INSERT INTO customers (user_name,user_email,user_password)
                VALUES (?,?,?)");

                $stmt->bind_param('sss',$name,$email,md5($password));



                //if account was created successfully
                if($stmt->execute()){
                    $user_id = $stmt->insert_id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['logged_in'] = true;
                    header('Location: customer-view-account.php?register_success=You registered succesfully');

                    //account could not be create
                }else {
                    header('location: customer-login.php?error=could not create an account at the moment');
                }
            }
        }

        //if user has already registered, then take user to account page
    } else if (isset($_SESSION['logged_in'])) {
        header('location: customer-view-account.php');
        exit;
    }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tulip's Pharmacy - Online Store </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="organicmart/safira/assets/img/favicon.ico">
    
    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/font.awesome.css">
    <!--ionicons css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/ionicons.min.css">
    <!--linearicons css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/linearicons.css">
    <!--animate css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="organicmart/safira/assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="organicmart/safira/assets/css/style.css">
    
    <!--modernizr min js here-->
    <script src="organicmart/safira/assets/js/vendor/modernizr-3.7.1.min.js"></script>

</head>

<body>

     <!--header area start-->
    
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
                
    </div>
    <?php
        include 'assets/navbar.php';
    ?>
    <!--offcanvas menu area end-->
    
    <!--header area start-->
    <?php
        include 'assets/header.php';
    ?>
    <!--header area end-->
    
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">

                <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action="loginProcess.php" method="post">
                            <p style="color: red" class="text-center"><?php if (isset($_GET['error1'])) { echo $_GET['error1']; } ?></p>
                            <p>   
                                <label>Email <span>*</span></label>
                                <input type="text" value="" class="form-control" autocomplete="off" name="email">
                             </p>
                             <p>   
                                <label>Passwords <span>*</span></label>
                                <input type="password" value="" class="form-control" autocomplete="off" name="password">
                             </p>   
                            <div class="login_submit">
                               <!-- <a href="#">Lost your password?</a> -->
                                <!-- <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label> -->
                                <button type="submit" name="login">login</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->
                <!--register area start-->
                <div class="col-lg-6 col-md-6 center">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form action="customer-login.php" method="post">
                            <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                            <p>   
                                <label>Name  <span>*</span></label>
                                <input type="text" class="form-control" name="name" autocomplete="off" required="required">
                            </p>
                            <p>   
                                <label>Email address  <span>*</span></label>
                                <input type="email" class="form-control" name="email" autocomplete="off" required="required">
                            </p>
                            <p>   
                                <label>Passwords <span>*</span></label>
                                <input type="password" class="form-control" name="password" autocomplete="off" required="required">
                            </p>
                            <p>   
                                <label>Confirm Passwords <span>*</span></label>
                                <input type="password" class="form-control" name="confirmpassword" autocomplete="off" required="required">
                            </p>
                            <p>
                                <input type="hidden" value="Customer">
                            </p>
                            <div class="login_submit">
                                <button type="submit" name="register">Register</button>
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->

    <!--footer area start-->
    <?php
        include 'assets/footer.php'
    ?>
    <!--footer area end-->
    
    
<!-- JS
============================================ -->
<!--jquery min js-->
<script src="organicmart/safira/assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="organicmart/safira/assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="organicmart/safira/assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="organicmart/safira/assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="organicmart/safira/assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="organicmart/safira/assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="organicmart/safira/assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="organicmart/safira/assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="organicmart/safira/assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="organicmart/safira/assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="organicmart/safira/assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="organicmart/safira/assets/js/slinky.menu.js"></script>
<!--instagramfeed menu js-->
<script src="organicmart/safira/assets/js/jquery.instagramFeed.min.js"></script>
<!-- tippy bundle umd js -->
<script src="organicmart/safira/assets/js/tippy-bundle.umd.js"></script>
<!-- Plugins JS -->
<script src="organicmart/safira/assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="organicmart/safira/assets/js/main.js"></script>


</body>

</html>