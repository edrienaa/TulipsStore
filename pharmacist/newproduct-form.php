<?php 
    include '../assets/connection.php';
    session_start();


                    if(isset($_POST["submit"])){
                        $ProductsID = $_POST ['ProductsID'];
                        $CollectionID = $_POST ['CollectionID'];
                        $CategoriesID = $_POST ['CategoriesID'];
                        $ProductName = $_POST ['ProductName'];
                        $BrandID = $_POST ['BrandID'];
                        $Description = $_POST ['Description'];
                        $Ingredient = $_POST ['Ingredient'];
                        $DOU = $_POST ['DOU'];
                        $Product_keyword = $_POST ['Product_keyword'];
                        $QuantityInStock = 'true';
                        $Price = $_POST ['Price'];

                        //accessing images
                        $Image = addslashes(file_get_contents($_FILES['Image']['tmp_name']));

                        //checking empty condition
                        if($ProductsID=='' or $CollectionID=='' or $CategoriesID=='' or $ProductName=='' or $BrandID='' or $Image==''){
                            echo "<script>alert('Please fill all the available fiels')</script>";
                            exit();
                        }
                        else{

                            //insert query
                            $insert_query = "INSERT INTO products (ProductsID, CollectionID, CategoriesID, ProductName, BrandID, Description, Ingredient, DOU, Product_keyword, Image, QuantityInStock, Price, Date)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

                            $stmt = mysqli_prepare($connection, $insert_query);

                            mysqli_stmt_bind_param($stmt, "ssssssssbssd", $ProductsID, $CollectionID, $CategoriesID, $ProductName, $BrandID, $Description, $Ingredient, $DOU, $Product_keyword, $Image, $QuantityInStock, $Price);

                            $result_insert = mysqli_stmt_execute($stmt);

                            mysqli_stmt_close($stmt);

                            if ($result_insert) {
                                echo "<script>alert('Record has been successfully added')
                                      window.location='data-products.php'</script>";
                            } else {
                                echo "<script>alert('Error: " . mysqli_error($connection) . "')</script>";
                            }

                            }
                        }
                    
?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../materializeadmin/html-version/materializehtml/assets/"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Pharmacist - Tulip's Pharmacy</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../materializeadmin/html-version/materializehtml/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/fonts/materialdesignicons.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/fonts/fontawesome.css" />
    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/select2/select2.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../materializeadmin/html-version/materializehtml/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="dashboard_pharmacist.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                <span style="color: var(--bs-primary)">
                  <svg width="268" height="150" viewBox="0 0 38 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z"
                      fill="currentColor" />
                    <path
                      d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z"
                      fill="url(#paint0_linear_2989_100980)"
                      fill-opacity="0.4" />
                    <path
                      d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z"
                      fill="currentColor" />
                    <path
                      d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                      fill="currentColor" />
                    <path
                      d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                      fill="url(#paint1_linear_2989_100980)"
                      fill-opacity="0.4" />
                    <path
                      d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z"
                      fill="currentColor" />
                    <defs>
                      <linearGradient
                        id="paint0_linear_2989_100980"
                        x1="5.36642"
                        y1="0.849138"
                        x2="10.532"
                        y2="24.104"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-opacity="1" />
                        <stop offset="1" stop-opacity="0" />
                      </linearGradient>
                      <linearGradient
                        id="paint1_linear_2989_100980"
                        x1="5.19475"
                        y1="0.849139"
                        x2="10.3357"
                        y2="24.1155"
                        gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-opacity="1" />
                        <stop offset="1" stop-opacity="0" />
                      </linearGradient>
                    </defs>
                  </svg>
                </span>
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2">Tulip's </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
                  fill="currentColor"
                  fill-opacity="0.6" />
                <path
                  d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
                  fill="currentColor"
                  fill-opacity="0.38" />
              </svg>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item">
              <a href="dashboard_pharmacist.php" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>

            <!-- Apps & Pages -->
            <li class="menu-header fw-light mt-4">
              <span class="menu-header-text">Apps &amp; Pages</span>
            </li>
            <li class="menu-item">
              <a href="app-calendar.html" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-calendar-blank-outline"></i>
                <div data-i18n="Calendar">Calendar</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div data-i18n="Users">Users</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="user-list.php" class="menu-link">
                    <div data-i18n="List">List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="wecare-list.php" class="menu-link">
                    <div data-i18n="We Care Program">We Care Program</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-file-document-outline"></i>
                <div data-i18n="Orders">Orders</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="order-list.php" class="menu-link">
                    <div data-i18n="List">List</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Data -->
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-grid"></i>
                <div data-i18n="Data">Data</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="data-categories.php" class="menu-link">
                    <div data-i18n="Categories">Categories</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="data-collections.php" class="menu-link">
                    <div data-i18n="Collections">Collections</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="data-brands.php" class="menu-link">
                    <div data-i18n="Brands">Brands</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="data-products.php" class="menu-link">
                    <div data-i18n="Products">Products</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php include 'assets/navbar.php'; ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit /</span> Product</h4>

              <!-- Basic Layout & Basic with Icons -->     
              <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Add New Product Form</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="ProductsID">Product ID</label>
                          <div class="col-sm-10">
                            <input 
                                type="text" 
                                class="form-control"
                                name="ProductsID"
                                placeholder="Enter Product ID"
                                autocomplete="off"
                                required="required">
                          </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="CollectionsID">Collection ID</label>
                        <div class="col-sm-10">
                          <select name="CollectionID" class="select2 form-select" data-allow-clear="true" required="required">
                            <option value="">Select Collection ID</option>
                            <?php
                                $select_query="SELECT * FROM collections";
                                $result_query=mysqli_query($connection,$select_query);
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $CollectionsName=$row['CollectionsName'];
                                    $CollectionsID=$row['CollectionsID'];
                                    echo "<option value='$CollectionsID'>$CollectionsName</option>";
                                }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="CategoriesID">Category ID</label>
                        <div class="col-sm-10">
                          <select name="CategoriesID" class="select2 form-select" data-allow-clear="true" required="required">
                            <option value="">Select Category </option>
                            <?php
                                $select_query="SELECT * FROM categories";
                                $result_query=mysqli_query($connection,$select_query);
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $CategoriesName=$row['CategoriesName'];
                                    $CategoriesID=$row['CategoriesID'];
                                    echo "<option value='$CategoriesID'>$CategoriesName</option>";
                                }
                            ?>
                          </select>
                        </div>
                      </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="ProductName">Product Name</label>
                          <div class="col-sm-10">
                            <input 
                                type="text" 
                                class="form-control"
                                name="ProductName"
                                placeholder="Enter Product Name"
                                autocomplete="off"
                                required="required">
                          </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="BrandID">Brand Name</label>
                        <div class="col-sm-10">
                          <select name="BrandID" class="select2 form-select" data-allow-clear="true" required="required">
                            <option value="">Select Brand</option>
                            <?php
                                $select_query="SELECT * FROM brands";
                                $result_query=mysqli_query($connection,$select_query);
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $BrandName=$row['BrandName'];
                                    $BrandID=$row['BrandID'];
                                    echo "<option value='$BrandID'>$BrandName</option>";
                                }
                            ?>
                          </select>
                        </div>
                      </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="Description">Description</label>
                          <div class="col-sm-10">
                            <textarea
                              class="form-control"
                              name="Description"
                              rows="4"
                              aria-describedby="basic-icon-default-message2">
                            </textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="Ingredient">Ingredient</label>
                          <div class="col-sm-10">
                            <textarea
                              class="form-control"
                              name="Ingredient"
                              rows="4"
                              aria-describedby="basic-icon-default-message2">
                            </textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="DOU">Direction of Use</label>
                          <div class="col-sm-10">
                            <textarea
                              id="basic-default-message"
                              class="form-control"
                              name="DOU"
                              rows="4"
                              aria-describedby="basic-icon-default-message2">
                            </textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="Product-keyword">Product Keyword</label>
                          <div class="col-sm-10">
                            <input 
                                type="text" 
                                class="form-control"
                                name="Product_keyword"
                                placeholder="Enter Product Keyword"
                                autocomplete="off">
                          </div>
                        <div class="mb-3">
                        <label for="Image" class="col-sm-2 col-form-label">Image</label>
                        <input class="form-control" type="file" name="Image" accept="Image/*" required="required">
                        </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="Price">Price (MYR)</label>
                        <div class="col-sm-10">
                          <input
                            type="text"
                            class="form-control"
                            name="Price"
                            placeholder="00.00"
                            autocomplete="off"
                            aria-label="Amount (to the nearest MYR)" />
                        </div>
                      </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </form>

            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , Tulip's Pharmacy<span class="text-danger">❤️</span>
                  </div>
                  <div>
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/popper/popper.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/js/bootstrap.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/moment/moment.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/select2/select2.js"></script>

    <!-- Main JS -->
    <script src="../materializeadmin/html-version/materializehtml/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../materializeadmin/html-version/materializehtml/assets/js/form-layouts.js"></script>
  </body>
</html>
