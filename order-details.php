<?php

/*
    not paid
    shipped
    delivered
*/

session_start();
include './assets/connection.php';
include './functions/common-function.php';

if (isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    $stmt = $connection->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->bind_param('i',$order_id);
    $stmt->execute();
    $order_details = $stmt->get_result();

    $order_total_price = calculateTotalOrderPrice($order_details);
} else{
    header("Location: customer-view-account.php");
    exit();
}

function calculateTotalOrderPrice($order_details){

    $total = 0;

    foreach ($order_details as $row) {
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];

        $total = $total + ($product_price = $product_quantity);
    }

    return $total;
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


    <!-- order details  -->
    <section class="main_content_area">
        <div class="container">   
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-9 col-lg-12">
                                <h3>Order Details</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>	 	
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($order_details as $row) {?>
                                                    <tr>
                                                        <td><?php echo $row['product_name']; ?></td>
                                                        <td>RM <?php echo $row['product_price']; ?></td>
                                                        <td><?php echo $row['product_quantity']; ?></td>
                                                    </tr>
                                            <?php } ?>
                                            </tbody>
                                    </table>
                                    <?php if ($order_status == "not paid") { ?>
                                        <form action="payment.php" style="float: right;" method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                                        <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>">
                                        <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
                                            <input type="submit" name="order_pay_btn" class="btn btn-success" value="Pay Now">
                                        </form>
                                    <?php } ?>
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