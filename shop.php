<?php
    include './assets/connection.php';
    include './functions/common-function.php';
    session_start();

    //use the search section
    if (isset($_POST['search'])) {

        //1. determine page no
        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            //if user has already entered page the page number is the one that they selected
            $page_no = $_GET['page_no'];
        } else {
            //if user just enetered the page then default page is 1
            $page_no = 1;
        }

        $product_keyword = $_POST['Product_keyword'];
        $price = isset($_POST['price']) ? $_POST['price'] : null;

        //2. return number of products
        $stmt1 = $connection->prepare("SELECT COUNT(*) As total_records FROM products WHERE Product_keyword=? AND Price<=?");
        $stmt1->bind_param('si',$product_keyword,$price);
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
        $stmt2 = $connection->prepare("SELECT * FROM products WHERE Product_keyword=? AND Price<=? LIMIT $offset,$total_records_per_page");
        $stmt2->bind_param("si",$product_keyword,$price);
        $stmt2->execute();
        $products = $stmt2->get_result();//[]

        

        //initialize $stmt
        $stmt = null;

        //modify the query based on wherether price is set or not
        if ($price !== null) {
            $stmt = $connection->prepare("SELECT * FROM products WHERE Product_keyword=? AND Price=?");
            if ($stmt) {
                $stmt->bind_param("si",$product_keyword,$price);
            } else{
            //handle query preparation error
            die("Error preparing the query");
            }
        } else{
        $stmt = $connection->prepare("SELECT * FROM products WHERE Product_keyword=?");
        if ($stmt) {
            $stmt->bind_param("s", $product_keyword);
        } else {
            //handle query preparation error
            die("Error preparing the query");
        }
    }

    $stmt->execute();
    $products = $stmt->get_result();

    //return all products ----> if you have small website 1000
    } else{
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
    
    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <form action="shop.php" method="post">
                                <h3>Ailment</h3>
                                <ul>
                                    <li>
                                        <div class="form-check form-check-dark">
                                            <input type="radio" class="form-check-input" value="cough" id="customRadioDark" name="Product_keyword" id="keyword_one" <?php if (isset($product_keyword) && $product_keyword=='cough') { echo 'checked'; } ?> >
                                            <label for="flexRadioDefault1" class="form-check-label">
                                                COUGH
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-dark">
                                            <input type="radio" class="form-check-input" value="dandruff" id="customRadioDark" name="Product_keyword" id="keyword_one" <?php if (isset($product_keyword) && $product_keyword=='dandruff') { echo 'checked'; } ?> >
                                            <label for="flexRadioDefault1" class="form-check-label">
                                                DANDRUFF
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-dark">
                                            <input type="radio" class="form-check-input" value="itchy" id="customRadioDark" name="Product_keyword" id="keyword_one" <?php if (isset($product_keyword) && $product_keyword=='itchy') { echo 'checked'; } ?> >
                                            <label for="flexRadioDefault1" class="form-check-label">
                                                ITCHY
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-dark">
                                            <input type="radio" class="form-check-input" value="tapeworm" name="Product_keyword" id="keyword_two" <?php if (isset($product_keyword) && $product_keyword=='tapeworm') { echo 'checked'; } ?>>
                                            <label for="flexRadioDefault1" class="form-check-label">
                                                WORM
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget_list widget_categories">
                                <h3>Product Tag</h3>
                                <ul>
                                    <li>
                                        <div class="form-check form-check-dark">
                                            <input type="radio" class="form-check-input" value="skin" id="customRadioDark" name="Product_keyword" id="keyword_one" <?php if (isset($product_keyword) && $product_keyword=='skin') { echo 'checked'; } ?> >
                                            <label for="flexRadioDefault1" class="form-check-label">
                                                SKIN
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                    <div class="form-check form-check-dark">
                                            <input type="radio" class="form-check-input" value="body" id="customRadioDark" name="Product_keyword" id="keyword_one" <?php if (isset($product_keyword) && $product_keyword=='Body') { echo 'checked'; } ?> >
                                            <label for="flexRadioDefault1" class="form-check-label">
                                                BODY
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-dark">
                                            <input type="radio" class="form-check-input" value="mask" name="Product_keyword" id="keyword_two" <?php if (isset($product_keyword) && $product_keyword=='mask') { echo 'checked'; } ?>>
                                            <label for="flexRadioDefault1" class="form-check-label">
                                                FACE MASK
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-dark">
                                            <input type="radio" class="form-check-input" value="hair" name="Product_keyword" id="keyword_two" <?php if (isset($product_keyword) && $product_keyword=='hair') { echo 'checked'; } ?>>
                                            <label for="flexRadioDefault1" class="form-check-label">
                                                HAIR
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-dark">
                                            <input type="radio" class="form-check-input" value="lip" name="Product_keyword" id="keyword_two" <?php if (isset($product_keyword) && $product_keyword=='lip') { echo 'checked'; } ?>>
                                            <label for="flexRadioDefault1" class="form-check-label">
                                                LIP
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <div class="widget_list widget_filter">
                                    <input type="submit" value="Search" name="search" class="btn rounded-pill btn-success">
                                </div>
                                </form>
                            </div>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">
                        <!-- fetching product shop -->
                        <?php
                            while ($row = $products->fetch_assoc()) {
                                $ProductsID=$row['ProductsID'];
                                $ProductName=$row['ProductName'];
                                $Price=$row['Price'];
                                $CategoriesID=$row['CategoriesID'];
                                $BrandID=$row['BrandID'];
                                $Image=$row['Image'];
                                echo "";
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                        <a class="primary_img" href="variable-product.php?id=<?php echo $row['ProductsID']; ?>"><img src="data:image/png;base64, <?php echo base64_encode($Image); ?>" height="400" width="400" alt=""></a>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a></li>
                                                <li class="quick_button"><a href="variable-product.php?id=<?php echo $row['ProductsID']; ?>" data-tippy="quick view" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="#modal_box" > <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="#" data-tippy="Add to Wishlist" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="variable-product.php?id=<?php echo $row['ProductsID']; ?>"><?php echo $ProductName; ?></a></h4>
                                        <div class="price_box"> 
                                            <span class="current_price">RM <?php echo $Price; ?></span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <?php } ?>
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