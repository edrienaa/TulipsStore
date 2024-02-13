<?php

include './assets/connection.php';

// //getting product
// function getproduct(){
//     global $connection;
// //condition to check isset or not
//      if(!isset($_GET['categories'])){
//         if(!isset($_GET['brands'])){
//     $select_query="SELECT * FROM products ORDER BY rand() LIMIT 0,5";
//     $result_query=mysqli_query($connection,$select_query);
//     // $row=mysqli_fetch_assoc($result_query);
//     // echo $row['ProductName'];

//     while($row=mysqli_fetch_assoc($result_query)){
//     $ProductID=$row['ProductID'];
//     $ProductName=$row['ProductName'];
//     $BrandID=$row['BrandID'];
//     $Image=$row['Image'];
//     $Price=$row['Price'];
//     echo "'<div class='product_items'>
//     <article class='single_product'>
//         <figure>
//             <div class='product_thumb'>
//                 <a class='primary_img' href='product-details.html'><img src='assets/imgs/$Image' alt=''></a>
//                 <div class='label_product'>
//                     <span class='label_sale'>Sale</span>
                    
//                 </div>
//                 <div class='action_links'>
//                     <ul>
//                         <li class='add_to_cart'><a href='cart.html' data-tippy='Add to cart' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true'> <span class='lnr lnr-cart'></span></a></li>
//                        <li class='quick_button'><a href='#' data-tippy='quick view' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true' data-bs-toggle='modal' data-bs-target='#modal_box' > <span class='lnr lnr-magnifier'></span></a></li>
//                          <li class='wishlist'><a href='wishlist.html' data-tippy='Add to Wishlist' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true'><span class='lnr lnr-heart'></span></a></li> 
//                         <li class='compare'><a href='#' data-tippy='Add to Compare' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true'><span class='lnr lnr-sync'></span></a></li>
//                     </ul>
//                 </div>
//             </div>
//             <figcaption class='product_content'>
//                 <h4 class='product_name'><a href='product-details.html'>$ProductNamea</a></h4>
//                 <p><a href='#'>Fruits</a></p>
//                 <div class='price_box'> 
//                     <span class='current_price'>RM $Price</span>
//                 </div>
//             </figcaption>
//         </figure>
//     </article>
// </div>
// </div>";
//     }
//     }
//     }
// }

// //getting all product
// function get_all_products(){
//     global $connection;
// //condition to check isset or not
//      if(!isset($_GET['categories'])){
//         if(!isset($_GET['brands'])){
//     $select_query="SELECT * FROM products ORDER BY rand()";
//     $result_query=mysqli_query($connection,$select_query);
//     // $row=mysqli_fetch_assoc($result_query);
//     // echo $row['ProductName'];

//     while($row=mysqli_fetch_assoc($result_query)){
//     $ProductID=$row['ProductID'];
//     $ProductName=$row['ProductName'];
//     $BrandID=$row['BrandID'];
//     $Image=$row['Image'];
//     $Price=$row['Price'];
//     echo "<article class='single_product'>
//     <figure>
//     <div class='product_thumb'>
//         <a class='primary_img' href='product-details.html'><img src='assets/imgs/$Image' alt=''></a>
//             <div class='label_product'>
//                 <span class='label_sale'>Sale</span>
//                 <span class='label_new'>New</span>
//             </div>
//             <div class='action_links'>
//                 <ul>
//                     <li class='add_to_cart'><a href='cart.html' data-tippy='Add to cart' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true'> <span class='lnr lnr-cart'></span></a></li>
//                     <li class='quick_button'><a href='#' data-tippy='quick view' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true' data-bs-toggle='modal' data-bs-target='#modal_box' > <span class='lnr lnr-magnifier'></span></a></li>
//                     <li class='wishlist'><a href='wishlist.html' data-tippy='Add to Wishlist' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true'><span class='lnr lnr-heart'></span></a></li>  
//                     <li class='compare'><a href='#' data-tippy='Add to Compare' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true'><span class='lnr lnr-sync'></span></a></li>
//                 </ul>
//             </div>
//             </div>
//             <figcaption class='product_content'>
//                 <h4 class='product_name'><a href='product-details.html'>$ProductName</a></h4>
//                     <p><a href='#'>Fruits</a></p>
//                     <div class='price_box'> 
//                     <span class='current_price'>RM $Price</span>
//                     </div>
//             </figcaption>
//     </figure>
//     </article>";
//     }
//     }
//     }
// }

//getting unique categories
// function get_uniquecategories(){
//     global $connection;
// //condition to check isset or not
//      if(isset($_GET['categories'])){
//         $CategoriesID=$_GET['categories'];
//     $select_query="SELECT * FROM products WHERE CategoriesID=$CategoriesID";
//     $result_query=mysqli_query($connection,$select_query);
//     $num_of_rows=mysqli_num_rows($result_query);
//     if($num_of_rows==0){
//         echo "<h2 class='text-center text-danger'>No stock for this categories</h2>";
//     }

//     while($row=mysqli_fetch_assoc($result_query)){
//     $ProductID=$row['ProductID'];
//     $ProductName=$row['ProductName'];
//     $BrandID=$row['BrandID'];
//     $Image=$row['Image'];
//     $Price=$row['Price'];
//     echo "<article class='single_product'>
//     <figure>
//     <div class='product_thumb'>
//         <a class='primary_img' href='product-details.html'><img src='assets/imgs/$Image' alt=''></a>
//             <div class='label_product'>
//                 <span class='label_sale'>Sale</span>
//                 <span class='label_new'>New</span>
//             </div>
//             <div class='action_links'>
//                 <ul>
//                     <li class='add_to_cart'><a href='cart.html' data-tippy='Add to cart' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true'> <span class='lnr lnr-cart'></span></a></li>
//                     <li class='quick_button'><a href='#' data-tippy='quick view' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true' data-bs-toggle='modal' data-bs-target='#modal_box' > <span class='lnr lnr-magnifier'></span></a></li>
//                     <li class='wishlist'><a href='wishlist.html' data-tippy='Add to Wishlist' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true'><span class='lnr lnr-heart'></span></a></li>  
//                     <li class='compare'><a href='#' data-tippy='Add to Compare' data-tippy-placement='top' data-tippy-arrow='true' data-tippy-inertia='true'><span class='lnr lnr-sync'></span></a></li>
//                 </ul>
//             </div>
//             </div>
//             <figcaption class='product_content'>
//                 <h4 class='product_name'><a href='product-details.html'>$ProductName</a></h4>
//                     <p><a href='#'>Fruits</a></p>
//                     <div class='price_box'> 
//                     <span class='current_price'>RM $Price</span>
//                     </div>
//             </figcaption>
//     </figure>
//     </article>";
//     }
//     }
//     }

//displaying categories
function getCategories() {
    global $connection;

    $select_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($connection, $select_categories);

    if (!$result_categories) {
        die("Database query failed."); // Handle query failure gracefully
    }

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $categoryName = htmlspecialchars($row_data['CategoriesName']); // Sanitize output
        $categoryID = $row_data['CategoriesID'];

        echo "<li><a href='categories-product.php?id=$categoryID'>$categoryName</a></li>";
    }
    
    mysqli_free_result($result_categories); // Free the result set
}


//searching products function

// function search_product(){}



// get ip address function
function getIPAddress() {  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}

// cart function
function cart(){
    global $connection; // Assuming $connection is defined somewhere in your code

    if(isset($_GET['add_to_cart'])){
        $get_ip_add = getIPAddress();
        $get_order_id = $_GET['add_to_cart'];
        
        // Use prepared statements to prevent SQL injection
        $select_query = "SELECT * FROM 'order' WHERE ip_address=? AND OrderID=?";
        $stmt = mysqli_prepare($connection, $select_query);
        mysqli_stmt_bind_param($stmt, "si", $get_ip_add, $get_order_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        $num_of_rows = mysqli_stmt_num_rows($stmt);

        if($num_of_rows > 0){
            return "This item is already present inside the cart";
            //echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            // Use prepared statements to prevent SQL injection
            $insert_query = "INSERT INTO 'order' (OrderID, ip_address, quantity) VALUES (?, ?, 1)";
            $stmt = mysqli_prepare($connection, $insert_query);
            mysqli_stmt_bind_param($stmt, "is", $get_ip_add, $get_order_id);
            mysqli_stmt_execute($stmt);

            return "This item is added to the cart";
            //echo "<script>alert('This item is added to cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}


//getting products
// function getproducts()

//fetch product
// function fetchproduct(){
//     $select_query="SELECT * FROM products ORDER BY RAND() LIMIT 0,16";
//                             $result_query=mysqli_query($connection, $select_query);
//                             // $row=mysqli_fetch_assoc($result_query);
//                             // echo $row ['ProductName'];
//                             while ($row=mysqli_fetch_assoc($result_query)) {
//                                 $ProductsID=$row['ProductsID'];
//                                 $ProductName=$row['ProductName'];
//                                 $Price=$row['Price'];
//                                 $CategoriesID=$row['CategoriesID'];
//                                 $BrandID=$row['BrandID'];
//                                 $Image=$row['Image'];
//                                 //echo "";
// }
?>