<?php
    include './assets/connection.php';
    include './functions/common-function.php';
    session_start();
?>

<?php

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
    
    <!--product details start-->
    <?php
        $id = $_GET ['id'];

        $query = mysqli_query ($connection, "SELECT * FROM products WHERE ProductsID = '$id'");

        while($data=mysqli_fetch_assoc($query)){
    ?>
    <div class="product_details variable_product mt-70 mb-70">
        <div class="container">
        
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="product-details-tab">
                   <form action="cart.php" method="post">
                    <input type="hidden" name="ProductsID" value="<?php echo $data['ProductsID']; ?>">
                    <input type="hidden" name="ProductName" value="<?php echo $data['ProductName']; ?>">
                    <input type="hidden" name="Price" value="<?php echo $data['Price']; ?>">
                    <input type="hidden" name="Image" value="<?php echo base64_encode($data['Image']); ?>">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="data:image/png;base64, <?php echo base64_encode($data['Image']); ?>" width="400" height="400" alt="big-1">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                            <h1><a href="#"><?php echo $data['ProductName']; ?></a></h1>
                            <div class="product_nav">
                            </div>
                            <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review) </a></li>
                                </ul>
                                
                            </div>
                            <div class="price_box">
                                <span class="current_price">RM <?php echo $data['Price']; ?></span>
                                
                            </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input min="1" max="100" value="1" type="number" name="Quantity">
                                <button class="button" type="submit" name="add_to_cart">add to cart</button> 
                            </div>
                            </form>
                            <div class=" product_d_action">
                               <ul>
                                   <li><a href="wishlist.php?id=<?php echo $data['ProductsID']; ?>" title="Add to wishlist">+ Add to Wishlist</a></li>
                               </ul>
                            </div>
                            
                        </form>
                        
                        <div class="product_d_meta">
                            <span>Category: <a href="#"><?php echo $data['CategoriesID']; ?></a></span>
                            <span>Tags: 
                                <a href="#"></a>
                                <a href="#"></a>
                            </span>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>    
    </div>
    <!--product details end-->
    
    <!--product info start-->
    <div class="product_d_info mb-65">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li >
                                    <a class="active" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#ingredient" role="tab" aria-controls="ingredient" aria-selected="false">Ingredient</a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#dou" role="tab" aria-controls="dou" aria-selected="false">Direction Of Use</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!--Description content start-->
                            <div class="tab-pane fade show active" id="description" role="tabpanel" >
                                <div class="product_info_content">
                                    <p><?php echo $data['Description']; ?></p>
                                </div>    
                            </div>
                            <!--Description content end-->
                            <!--Ingredient content start-->
                            <div class="tab-pane fade" id="ingredient" role="tabpanel" >
                                <div class="prodcut_d_table">
                                    <p><?php echo $data['Ingredient']; ?></p>
                                </div>
                            </div>
                            <!--Ingredient content end-->
                            <!--DOU content start-->
                            <div class="tab-pane fade" id="dou" role="tabpanel">
                                <div class="dou_wrapper">
                                <p><?php echo $data['DOU']; ?></p>
                                </div>
                            </div>
                            <!--Review content end-->
                        </div>
                <?php } ?>
                    </div>     
                </div>
            </div>
        </div>    
    </div>  
    <!--product info end-->
    
    <!--product area start-->
    <section class="product_area related_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Shop More	</h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-12">
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php
                            $line = 0;
                            $select_query="SELECT * FROM products ";
                            $result_query=mysqli_query($connection,$select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                                $ProductID=$row['ProductsID'];
                                $ProductName=$row['ProductName'];
                                $Image=$row['Image'];
                                $Price=$row['Price'];
                        ?>
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="data:image/png;base64, <?php echo base64_encode($Image); ?>" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart"><a href="cart.php?id=<?php echo $row['ProductsID']; ?>" data-tippy="Add to cart" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"> <span class="lnr lnr-cart"></span></a></li>
                                            <li class="quick_button"><a href="variable-product.php?id=<?php echo $row['ProductsID']; ?>" data-tippy="View Detail" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true">  <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.php?id=<?php echo $row['ProductsID']; ?>" data-tippy="Add to Wishlist" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"><span class="lnr lnr-heart"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="product-details.html"><?php echo $ProductName; ?></a></h4>
                                    <div class="price_box"> 
                                        <span class="current_price">RM <?php echo $Price; ?></span>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                        <?php 
                        } 
                        ?>
                    </div>
                </div>
            </div>  
        </div>
    </section>
    <!--product area end-->

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