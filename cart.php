<?php
    include './assets/connection.php';
    include './functions/common-function.php';
    session_start();

    // Initialize $_SESSION['cart'] if not set
    if (!isset($_SESSION['cart'])) {

        $_SESSION['cart'] = array();

    }

    if (isset($_POST['add_to_cart'])) {

        // If this user has already added a product to cart
        if (isset($_SESSION['cart'])) {

            $product_array_ids = array_column($_SESSION['cart'], "ProductsID"); //[2,3,4,10,15]
            
            // If product has already been added to cart or not
            if (!in_array($_POST['ProductsID'], $product_array_ids)) { 

                $ProductsID = $_POST['ProductsID'];

                $product_array = array(
                    'ProductsID' => $_POST['ProductsID'],
                    'ProductName' => $_POST['ProductName'],
                    'Price' => $_POST['Price'],
                    'Image' => $_POST['Image'],
                    'Quantity' => $_POST['Quantity']
                );

                // Use $product_array['ProductsID'] instead of $ProductsID
                $_SESSION['cart'][$product_array['ProductsID']] = $product_array;

            // Product has already been added
            } else {

                echo '<script>alert("Product was already added to cart");</script>';
                // echo '<script>window.location="index.php";</script>';
            }

        // If this is the first product
        } else {

            $ProductsID = $_POST['ProductsID'];
            $ProductName = $_POST['ProductName'];
            $Price = $_POST['Price'];
            $Image = $_POST['Image'];
            $Quantity = $_POST['Quantity'];

            $product_array = array(
                'ProductsID' => $ProductsID,
                'ProductName' => $ProductName,
                'Price' => $Price,
                'Image' => $Image,
                'Quantity' => $Quantity
            );

            $_SESSION['cart'][$ProductsID] = $product_array;
            // [ 2=>[] , 3=>[], 5=>[] ]
        }

        //calculate total
        calculateTotalCart();

    // Remove product from cart
    } else if (isset($_POST['remove_product'])) {

        $ProductsID = $_POST['ProductsID'];
        unset($_SESSION['cart'][$ProductsID]);

        //calculate total
        calculateTotalCart();

    } else if (isset($_POST['edit_quantity'])) {

        //we get id and quantity from the form
        $ProductsID = $_POST['ProductsID'];
        $Quantity = $_POST['Quantity'];

        //get the product array from the session
        $product_array = $_SESSION['cart'][$ProductsID];

        //update product quantity
        $product_array['Quantity'] = $Quantity;

        //return array back its place
        $_SESSION['cart'][$ProductsID] = $product_array;

        //calculate total
        calculateTotalCart();
    }
    
    else {

        //header('location: index.php');

    }

    function calculateTotalCart(){

        $total_price = 0;
        $total_quantity = 0;

        foreach($_SESSION['cart'] as $key => $value){

            $product = $_SESSION['cart'][$key];

            $Price = $product['Price'];
            $Quantity = $product['Quantity'];

            $total_price = $total_price + ($Price * $Quantity);
            $total_quantity = $total_quantity + $Quantity;
        }

        $_SESSION['total'] = $total_price;
        $_SESSION['quantity'] = $total_quantity;
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
    

     <!--shopping cart area start -->
    <div class="shopping_cart_area mt-70">
        <div class="container">  
            <form action="#"> 
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page">
                                <table>
                                <thead>
                                    <tr>
                                        <!-- <th class='product_thumb'>Image</th> -->
                                        <th class='product_name'>Product</th>
                                        <th class='product-price'>Price</th>
                                        <th class='product_quantity'>Quantity</th>
                                        <th class='product_total'>Total</th>
                                        <th class='product_remove'>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        //check if $_SESSION['cart'] is set before iterating
                                        if(isset($_SESSION['cart'])){
                                            foreach($_SESSION['cart'] as $key => $value){ 
                                    ?>
                                    <tr>
                                        <!-- <td class="product_thumb"><img src="<?php //echo $value['Image']; ?>" alt="Product Image"></a></td> -->
                                        <td class="product_name"><a href="#"><?php echo $value['ProductName']; ?></a></td>
                                        <td class="product-price">RM <?php echo $value['Price']; ?></td>
                                        <td class="product_quantity">
                                        <form action="cart.php" method="post">
                                        <label>Quantity</label>
                                        <input type="hidden" value="<?php echo $value['ProductsID']; ?>" name="ProductsID">
                                        <input min="1" type="number" name="Quantity" value="<?php echo $value['Quantity']; ?>">
                                        <button type="submit" class="update_quantity" name="edit_quantity">edit</button>
                                        <!-- <div class="quantity_box"> -->
                                        <!-- </div> -->
                                        </form>
                                        </td>
                                        <td class="product_total">RM <?php echo $subtotal=($value['Price'] * $value['Quantity']); ?></td>
                                        <form action="cart.php" method="POST">
                                        <input type="hidden" name="ProductsID" value="<?php echo $value['ProductsID'] ?>">
                                        <td class="product_remove"><input type="submit" name="remove_product" class="remove-btn" value="remove" onclick="return confirm('Are you sure you want to delete this item?')"></td>
                                        </form>
                                                        
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                            
                            <!-- </tbody> -->
                        </table>   
                            </div>
                        </div>
                     </div>
                 </div>

                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <?php if (isset($_SESSION['cart'])) { ?>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount">RM <?php echo $_SESSION['total']; ?></p>
                                   </div>
                                   <div class="cart_subtotal ">
                                       <p>Shipping</p>
                                       <p class="cart_amount"> RM <?php //echo $_SESSION['shipping']; ?> </p>
                                   </div>

                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">RM <?php echo $_SESSION['total']; ?> </p>
                                   </div>
                                <?php } ?>
                                   <div class="checkout_btn">
                                    <form action="checkout.php" method="post">
                                    <button type="submit" class="checkout-btn" name="checkout">check out</button>
                                    </form>
                                       
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form> 
        </div>     
    </div>
     <!--shopping cart area end -->
    
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