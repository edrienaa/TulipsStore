<?php
    include './assets/connection.php';
    include './functions/common-function.php';
    session_start();

        if(isset($_POST['add_to_cart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity=1;

        //select cart data based on condition
        $select_cart=mysqli_query($connection, "SELECT * FROM cart WHERE ProductName='$product_name'");
        if(mysqli_num_rows($select_cart)>0){
            $display_message[]="Product already added to cart";
        }
        else{
            //insert cart data in cart table
        $insert_products=mysqli_query($connection, "INSERT INTO cart (ProductName, Price, Image, Quantity) 
        VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')");
        $display_message[]="product added to cart";
        }
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
    
    <!--shop  area start-->
    <div class="shop_area shop_fullwidth mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                     <div class="row shop_wrapper">
                        <!-- fetching product -->
                        <?php
                            $id = $_GET ['id'];
                            $select_query="SELECT * FROM products WHERE CategoriesID = '$id' ORDER BY RAND() LIMIT 0,16";
                            $result_query=mysqli_query($connection, $select_query);
                            // $row=mysqli_fetch_assoc($result_query);
                            // echo $row ['ProductName'];
                            while ($row=mysqli_fetch_assoc($result_query)) {
                                $ProductsID=$row['ProductsID'];
                                $ProductName=$row['ProductName'];
                                $Price=$row['Price'];
                                $CategoriesID=$row['CategoriesID'];
                                $BrandID=$row['BrandID'];
                                $Image=$row['Image'];
                                echo "";
                            
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                        <a class="primary_img" href="variable-product.php"><img src="data:image/png;base64, <?php echo base64_encode($Image); ?>" height="600" width="600" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="add_to_cart.php?id=<?php echo $row['ProductsID']; ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a></li>
                                                <li class="quick_button"><a href="variable-product.php?id=<?php echo $row['ProductsID']; ?>" data-tippy="View detail" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" data-tippy="Add to Wishlist" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="product-details.html"><?php echo $ProductName; ?></a></h4>
                                        <div class="price_box"> 
                                            <span class="current_price">RM <?php echo $Price; ?></span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <?php 
                            }
                    ?>
                    </div>

                    <!-- calling function -->
                    <?php
                        // $ip = getIPAddress();  
                        // echo 'User Real IP Address - '.$ip; 
                        cart(); 
                    ?>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
    
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