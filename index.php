<?php
    include './assets/connection.php';
    include './functions/common-function.php';
    session_start();
        
?>

<?php
    //1. determine page no
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        //if user has already entered page the page number is the one that they selected
        $page_no = $_GET['page_no'];
    } else {
        //if user just enetered the page then default page is 1
        $page_no = 1;
    }

    //2. return number of products
    $stmt1 = $connection->prepare("SELECT COUNT(*) As total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    //3. products per page
    $total_records_per_page = 9;

    $offset = ($page_no-1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacents = "2";

    $total_no_of_pages = ceil($total_records/$total_records_per_page);

    //4. get all products
    $stmt2 = $connection->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result();


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
    
    <!--shop  area start-->
    <div class="shop_area shop_fullwidth mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                     <div class="row shop_wrapper">
                        <!-- fetching product -->
                        <?php
                            $select_query="SELECT * FROM products ORDER BY RAND() LIMIT 0,16";
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
                                    <a class="primary_img" href="variable-product.php?id=<?php echo $row['ProductsID']; ?>">
                                        <img src="data:image/png;base64, <?php echo base64_encode($Image); ?>" height="400" width="400" alt="">
                                    </a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="quick_button">
                                                    <a href="variable-product.php?id=<?php echo $row['ProductsID']; ?>" data-tippy="Buy" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> 
                                                        <span class="lnr lnr-cart"></span>
                                                    </a>
                                                </li>
                                                <li class="wishlist">
                                                    <a href="wishlist.html" data-tippy="Add to Wishlist" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true">
                                                        <span class="lnr lnr-heart"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                <div class="product_content grid_content">
                                    <h4 class="product_name">
                                        <a href="variable-product.php?id=<?php echo $row['ProductsID']; ?>"><?php echo $ProductName; ?></a>
                                    </h4>
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

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="back <?php if($page_no<=1) { echo 'disabled'; } ?> ">
                                <a href="<?php if ($page_no <= 1) { echo '#'; } else{ echo "?page_no=".($page_no-1); } ?>"><</a></li>
                                <li><a href="?page_no=1">1</a></li>
                                <li><a href="?page_no=2">2</a></li>
                                <?php if ($page_no >=3) { ?>
                                    <li><a href="#">..</a></li>
                                    <li><a href="<?php echo "?page_no=".$page_no; ?>"><?php echo $page_no; ?></a></li>
                                <?php } ?>
                                <li class="next <?php if ($page_no>= $total_no_of_pages) { echo 'disabled'; } ?> ">
                                <a href="<?php if ($page_no >= $total_no_of_pages ) { echo '#'; } else{ echo "?page_no=".($page_no+1); } ?>">next</a></li>
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