<?php
    session_start();
    include './assets/connection.php';
    include './functions/common-function.php';

    if (isset($_POST['order_pay_btn'])) {
        $order_status = $_POST['order_status'];
        $order_total_price = $_POST['order_total_price'];
    }
    
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tulip's Pharmacy - Online Store</title>
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
    <link rel="stylesheet" href="organicmart/safira/organicmart/safira/assets/css/slinky.menu.css">
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
    
    <!--Checkout page section-->
    <div class="Checkout_section mt-70">
       <div class="container">
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h3>Payment</h3>
                    </div>
                    <div class="mx-autocontainer text-center">

                    <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid") { ?>
                                <?php $amount = strval($_POST['order_total_price']); ?>
                                <?php $order_id = $_POST['order_id']; ?>
                                <p>Total payment: RM <?php echo $_POST['order_total_price']; ?></p>
                                <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->
                                <!-- Set up a container element for the button -->
                                <div id="paypal-button-container"></div>

                    <?php } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0) {?>
                        <?php $amount = strval($_SESSION['total']); ?>
                        <?php $order_id = $_SESSION['order_id']; ?>
                        <p>Total payment: RM <?php echo $_SESSION['total']; ?></p>
                        <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->
                        <!-- Set up a container element for the button -->
                        <div class="mx-autocontainer text-center">
                            <div id="paypal-button-container"></div>
                            </div>
                        

                        <?php } else{ ?>
                            <p>You don't have an order</p>
                        <?php } ?>

                        

                    </div>
                </div> 
            </div> 
        </div>       
    </div>
    <!--Checkout page section end-->

    <!-- Include the PayPal Javascript SDK; replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AWc-lhgDz1O1g7WjC9e_YADybcpQAWHmAOHqAS2mmp-XB2iua81qcIj-FkgZm2nw4lOVpaSOfHBqB_Sr&currency=USD"></script>

    

    <script>
        paypal.Buttons({

            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $amount; ?>' //Can reference variables or functions. Example: `value: document.getElementById('...').value`
                        }
                    }]
                });
            },

            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purpose:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    window.location.href = "server/complete_payment.php?transaction_id="+transaction.id+"&order_id="+<?php echo $order_id; ?>;

                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // var element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL: actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');
    </script>

    
     <!--footer area start-->
    <?php
        include 'assets/footer.php';
    ?>
    <!--footer area end-->

    
    
    
<!-- JS
============================================ -->
<!--jquery min js-->
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="assets/js/slinky.menu.js"></script>
<!--instagramfeed menu js-->
<script src="assets/js/jquery.instagramFeed.min.js"></script>
<!-- tippy bundle umd js -->
<script src="assets/js/tippy-bundle.umd.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>




</body>

</html>