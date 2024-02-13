<?php
    include './assets/connection.php';
    include './functions/common-function.php';
    session_start();
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
    <link rel="shortcut icon" type="image/x-icon" href="../organicmart/safira/assets/img/favicon.ico">
    
     <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/font.awesome.css">
    <!--ionicons css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/ionicons.min.css">
    <!--linearicons css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/linearicons.css">
    <!--animate css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="../organicmart/safira/assets/css/style.css">
    
    <!--modernizr min js here-->
    <script src="../organicmart/safira/assets/js/vendor/modernizr-3.7.1.min.js"></script>

</head>

<body>

    <!--header area start-->
    
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">
                
    </div>
    <!--offcanvas menu area end-->
    
    <!--header area start-->
    <?php
        include 'assets/header.php';
    ?>
    
    <?php
        if (isset($display_message)){
            foreach($display_message as $display_message){
            echo "<div class='display_message'
            <span>$display_message</span>
            <i class='fas fa-times' onClick='this.parentElement.style.display=`none`';></i>
            </div>";
        }
    }
    ?>
    <!--header area end-->
    
    <!--contact map start-->
    <div class="contact_map mt-70">
       <div class="map-area">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.4786550888134!2d103.93499347396286!3d1.4848116611292719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da412ba73aaad3%3A0xe6c02b12157befa9!2sTULIPS%20PHARMACY!5e0!3m2!1sen!2smy!4v1706463745949!5m2!1sen!2smy" 
        width="100%" 
        height="600" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
        </iframe>
       </div>
    </div>
    <!--contact map end-->
    
    <!--contact area start-->
    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="contact_message content">
                        <h3>contact us</h3>    
                         <p>Pharmacy, Health care and Beauty Shop</p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Address : No 25A, Jalan Ekoperniagaan 7, Taman Kota Masai, Pasir Gudang, Johor 81700 Kampong Sungai Rinting Johor</li>
                            <li><i class="fa fa-phone"></i> <a href="tel:(60)179393043">(60) 17 939 3043</a></li>
                        </ul>             
                    </div> 
                </div>
            </div>
        </div>    
    </div>

    <!--contact area end-->

    <!--footer area start-->
    <?php
        include './assets/footer.php';
    ?>
    <!--footer area end-->



<!-- JS
============================================ -->

<!--map js code here-->
<script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>
<script  src="https://www.google.com/jsapi"></script>
<script src="../organicmart/safira/assets/js/map.js"></script>

<!--jquery min js-->
<script src="../organicmart/safira/assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="../organicmart/safira/assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="../organicmart/safira/assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="../organicmart/safira/assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="../organicmart/safira/assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="../organicmart/safira/assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="../organicmart/safira/assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="../organicmart/safira/assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="../organicmart/safira/assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="../organicmart/safira/assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="../organicmart/safira/assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="../organicmart/safira/assets/js/slinky.menu.js"></script>
<!--instagramfeed menu js-->
<script src="../organicmart/safira/assets/js/jquery.instagramFeed.min.js"></script>
<!-- tippy bundle umd js -->
<script src="../organicmart/safira/assets/js/tippy-bundle.umd.js"></script>
<!-- Plugins JS -->
<script src="../organicmart/safira/assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="../organicmart/safira/assets/js/main.js"></script>


</body>

</html>