<?php
    if(isset($_GET['search_text'])){
        $search_text = $_GET['search_text'];

        $sql = "SELECT * FROM products WHERE ProductName LIKE '$search_text'";
        $query = mysqli_query($connection, $sql);

        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);

            $ProductsID = $data['ProductsID'];
            $CollectionID = $data['CollectionID'];
            $CategoriesID = $data['CategoriesID'];
            $ProductName = $data['ProductName'];
            $BrandID = $data['BrandID'];
            $Description = $data['Description'];
            $Ingredient = $data['Ingredient'];
            $DOU = $data['DOU'];
            $Product_keyword = $data['Product_keyword'];
            $Image = $data['Image'];
            $QuantityInStock = $data['QuantityInStock'];
            $Price = $data['Price'];

            echo; 

            

        }
    }
?>

<header>
        <div class="main_header">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="language_currency">
                                <ul>
                                    <li class="currency"><a href="#"> Currency <i class="icon-right ion-ios-arrow-down"></i></a>
                                        <ul class="dropdown_currency">
                                            <li><a href="index.php">MYR (RM)</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header_social text-right">
                                <ul>
                                    <li><a href="https://www.facebook.com/people/Tulips-Pharmacy/100063558427984/"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="auth-login.php"><i class="ion-person"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                            <div class="logo">
                                <a href="index.php"><img src="assets/imgs/logo/logo.png" height="28" width="118" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-7 col-8">
                            <div class="header_right_info">
                                <div class="search_container mobail_s_none">
                                   <form action="#">
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text">
                                             <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="header_account_area">
                                    <div class="header_account_list register">
                                        <ul>
                                            <li><a href="customer-login.php">Register</a></li>
                                            <li><span>/</span></li>
                                            <li><a href="customer-login.php">Login</a></li>
                                        </ul>
                                    </div>
                                    <div class="header_account_list header_wishlist">
                                        <a href="./wishlist.php"><span class="lnr lnr-heart"></span></a>
                                    </div>
                                    <div class="header_account_list  mini_cart_wrapper">
                                       <a href="./cart.php"><span class="lnr lnr-cart"></span><?php if (isset($_SESSION['quantity']) && $_SESSION['quantity'] !=0 ) { ?>
                                        <span class="item_count"><?php echo $_SESSION['quantity']; ?> </span>
                                       <?php } ?></a>
                                   </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div> 
        <div class="header_bottom sticky-header">
                    <div class="container">  
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6 mobail_s_block">
                                <div class="search_container">
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text" name="search_text">
                                            <button type="submit" name="search_btn"><span class="lnr lnr-magnifier"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="categories_menu">
                                    <div class="categories_title">
                                        <h2 class="categori_toggle">All Categories</h2>
                                    </div>
                                    <div class="categories_menu_toggle">
                                        <ul>
                                            <?php
                                                getcategories();
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!--main menu start-->
                                <div class="main_menu menu_position"> 
                                    <nav>  
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="shop.php">Shop</a></li> 
                                            <li><a href="customer-view-account.php"> My Account</a></li>
                                            <li><a href="contact.php"> Contact Us</a></li>
                                        </ul>  
                                    </nav> 
                                </div>
                                <!--main menu end-->
                            </div>
                            <div class="col-lg-3">
                                <div class="call-support">
                                    <p><a href="tel:(08)179393043">(60) 17 939 3043</a> Customer Support</p>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    </header>