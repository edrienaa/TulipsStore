<?php

session_start();
include './assets/connection.php';
include './functions/common-function.php';

if (!isset($_SESSION['logged_in'])) {
    header("Location: customer-login.php");
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('Location: customer-login.php');
        exit;
    }
}

if (isset($_POST['change_password'])) {

    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $user_email = $_SESSION['user_email'];

    //if password dont match
    if ($password !== $confirmpassword) {
        header('Location: customer-view-account.php?error=password dont match');
    
    //if password is less than 6 char
    }else if (strlen($password) < 6) {
        header('Location: customer-view-account.php?error=password must be at least 6 characters');
    
        //no error
    }else {
    $stmt = $connection->prepare("UPDATE customers SET user_password=? WHERE user_email=?");
    $stmt->bind_param('ss',md5($password),$user_email);

    if($stmt->execute()){
        header('Location: customer-view-account.php?message1=password has been updated successfully');
    }else {
        header('Location: customer-view-account.php?error=could not update password');
    }
    }

}

//get orders
if (isset($_SESSION['logged_in'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $connection->prepare("SELECT * FROM orders WHERE user_id=? ");
    $stmt->bind_param('i',$user_id);
    $stmt->execute();
    $orders = $stmt->get_result();//[]
}

?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tulips Pharmacy - Online Store </title>
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
    
    <?php
        include 'assets/header.php';
    ?>
    <!--header area end-->


    <!-- my account start  -->
    <section class="main_content_area">
        <div class="container">   
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tab">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                            </ul>
                        </div>    
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>Dashboard </h3>
                                <h4 class="text-center" style="color: green"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success']; } ?></h4>
                                <h4 class="text-center" style="color: green"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success']; } ?></h4>
                                <p>From your account dashboard. you can easily check &amp; view your <a href="#orders">recent orders</a> and <a href="account-details">edit your password and account details.</a></p>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="row container mx-auto">
                                    <?php if (isset($_GET['payment_message'])) { ?>
                                        <p class="mt-5 text-center" style="color: green;"><?php echo $_GET['payment_message']; ?></p>
                                    <?php } ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Total</th>	 	
                                                <th>Status</th> 	 	
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $orders->fetch_assoc() ) { ?>
                                                    <tr>
                                                        <td><?php echo $row['order_id']; ?></td>
                                                        <td><?php echo $row['order_date']; ?></td>
                                                        <td>RM <?php echo $row['order_cost']; ?></td>
                                                        <td><?php echo $row['order_status']; ?></td>
                                                        <td>
                                                            <form action="order-details.php" method="POST">
                                                                <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status">
                                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                                <input type="submit" name="order_details_btn" class="btn btn-success" value="Detail">
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                                <p>Name: <span> <?php if (isset($_SESSION['user_name'])) { echo $_SESSION['user_name']; } ?> </span></p>
                                                <p>Email: <span> <?php if (isset($_SESSION['user_email'])) { echo $_SESSION['user_email']; } ?></span></p>
                                                <p><a href="customer-view-account.php?logout=1" id="logout-btn">Logout</a></p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="change_pass_form_container">
                                        <div class="change_pass_form">
                                            <form action="customer-view-account.php" method="post">
                                                <p class="text-center" style="color: red"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
                                                <p class="text-center" style="color: green"><?php if(isset($_GET['message1'])){ echo $_GET['message1']; } ?></p>
                                                <h3>Change Password</h3>
                                                <hr class="mx-auto">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="account-password" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Confirm Password</label>
                                                    <input type="password" name="confirmpassword" id="account-password-confirm" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Change Password" class="btn" id="change-pass-btn" name="change_password">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>        	
    </section>			
    <!-- my account end   --> 

      <!--footer area start-->
    <?php
        include './assets/footer.php';
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