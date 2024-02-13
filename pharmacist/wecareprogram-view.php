<?php
    include '../assets/connection.php';
    session_start();
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
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/css/pages/page-user-view.css" />
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
            <a href="index.html" class="app-brand-link">
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
              <span class="app-brand-text demo menu-text fw-bold ms-2">Tulip's</span>
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
              <a href="app-calendar.php" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-calendar-blank-outline"></i>
                <div data-i18n="Calendar">Calendar</div>
              </a>
            </li>
            <li class="menu-item open active">
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
                <li class="menu-item active">
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
            <li class="menu-item">
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

            <?php
                $id = $_GET ['id'];
                $query = mysqli_query ($connection, "SELECT * FROM wecareprogram WHERE phone_number = '$id'");
                while ($data = mysqli_fetch_assoc($query)){
            ?>

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / We Care Program /</span> Account</h4>
              <div class="row">
                <!-- User Sidebar -->
                <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                  <!-- User Card -->
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                          <div class="user-info text-center">
                            <h4><?php echo $data ['name']; ?></h4>
                            <span class="badge bg-label-danger">Customer</span>
                          </div>
                        </div>
                      </div>
                      <h5 class="pb-3 border-bottom mb-3">Details</h5>
                      <div class="info-container">
                        <ul class="list-unstyled mb-4">
                          <li class="mb-3">
                            <span class="fw-semibold text-heading me-2">Age:</span>
                            <span><?php echo $data ['age']; ?></span>
                          </li>
                          <li class="mb-3">
                            <span class="fw-semibold text-heading me-2">Phone Number:</span>
                            <span><?php echo $data ['phone_number']; ?></span>
                          </li>
                          <li class="mb-3">
                            <span class="fw-semibold text-heading me-2">Status:</span>
                            <span class="badge bg-label-success">Active</span>
                          </li>
                          <li class="mb-3">
                            <span class="fw-semibold text-heading me-2">Height:</span>
                            <span><?php echo $data ['height']; ?> cm</span>
                          </li>
                          <li class="mb-3">
                            <span class="fw-semibold text-heading me-2">Birth Date:</span>
                            <span><?php echo $data ['birth_date']; ?></span>
                          </li>
                          <li class="mb-3">
                            <span class="fw-semibold text-heading me-2">Start Joined:</span>
                            <span><?php echo $data ['start_joined']; ?></span>
                          </li>
                          <li class="mb-3">
                            <span class="fw-semibold text-heading me-2">Latest Reading:</span>
                            <span><?php echo $data ['latest_reading']; ?></span>
                          </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                          <a
                            href="javascript:;"
                            class="btn btn-primary me-3"
                            data-bs-target="#editUser"
                            data-bs-toggle="modal"
                            >Edit</a
                          >
                          <a href="pros-delete-wecarelist.php?id=<?php echo $data['phone_number'];?>" class="btn btn-outline-danger suspend-user">Suspended</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /User Card -->
                </div>
                <!--/ User Sidebar -->

                <!-- User Content -->
                <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

                  <!-- Project table -->
                  <div class="card mb-4">
                    <h5 class="card-header">We Care Program</h5>
                    <div class="table-responsive mb-3">
                      <table class="table datatable">
                        <thead class="table-light">
                          <tr>
                            <th></th>
                            <th>Reading</th>
                            <th>Unit</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Diagnosis</td>
                                <td>
                                <?php echo $data ['diagnosis']; ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Medication</td>
                                <td>
                                <?php echo $data ['medication']; ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Uric Acid</td>
                                <td>
                                    <?php echo $data ['uric_acid']; ?>
                                </td>
                                <td>
                                    mmol/L
                                </td>
                            </tr>
                            <tr>
                                <td>Cholestrol</td>
                                <td>
                                    <?php echo $data ['cholestrol']; ?>
                                </td>
                                <td>
                                    mmol/L
                                </td>
                            </tr>
                            <tr>
                                <td>Prescribed Action</td>
                                <td>
                                    <?php echo $data ['prescribed_action']; ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Prescribed Medication</td>
                                <td>
                                    <?php echo $data ['prescribed_medication']; ?>
                                </td>
                                <td></td>
                            </tr>
                            <th><h5>Blood Preasure</h5></th>
                            <tr>
                                <td>Systolic</td>
                                <td>
                                <?php echo $data ['BP_systolic']; ?>
                                </td>
                                <td>
                                    mmHg
                                </td>
                            </tr>
                            <tr>
                                <td>Diastolic</td>
                                <td>
                                <?php echo $data ['BP_diastolic']; ?>
                                </td>
                                <td>
                                    mmHg
                                </td>
                            </tr>
                            <tr>
                                <td>Pulse</td>
                                <td>
                                <?php echo $data ['BP_pulse']; ?>
                                </td>
                                <td>
                                    mmHg
                                </td>
                            </tr>
                            <th><h5>Glucose</h5></th>
                            <tr>
                                <td>Fasting</td>
                                <td>
                                <?php echo $data ['GC_fasting']; ?>
                                </td>
                                <td>
                                    mmol/L
                                </td>
                            </tr>
                            <tr>
                                <td>After Meal</td>
                                <td>
                                <?php echo $data ['GC_aftermeal']; ?>
                                </td>
                                <td>
                                    mmol/L
                                </td>
                            </tr>
                            
                            
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /Project table -->
                </div>
                <!--/ User Content -->
              </div>

              <!-- Modal -->
              <!-- Edit User Modal -->
              <?php
                $id = $_GET['id'];

                $query = mysqli_query ($connection, "SELECT * FROM wecareprogram WHERE phone_number = '$id'");

                if (isset($_POST['updatebtn'])) {
                  $up_diagnosis = $_POST['up_diagnosis'];
                  $up_medication = $_POST['up_medication'];
                  $up_BP_systolic = $_POST['up_BP_systolic'];
                  $up_BP_diastolic = $_POST['up_BP_diastolic'];
                  $up_BP_pulse = $_POST['up_BP_pulse'];
                  $up_GC_fasting = $_POST['up_GC_fasting'];
                  $up_GC_aftermeal = $_POST['up_GC_aftermeal'];
                  $up_uric_acid = $_POST['up_uric_acid'];
                  $up_cholestrol = $_POST['up_cholestrol'];
                  $up_prescribed_action = $_POST['up_prescribed_action'];
                  $up_prescribed_medication = $_POST['up_prescribed_medication'];

                  $query_update = mysqli_query ($connection, "UPDATE wecareprogram
                  SET diagnosis='$up_diagnosis', medication='$up_medication', BP_systolic='$up_BP_systolic', BP_diastolic='$up_BP_diastolic', BP_pulse='$up_BP_pulse', GC_fasting='$up_GC_fasting', GC_aftermeal='$up_GC_aftermeal', uric_acid=''$up_uric_acid, cholestrol='$up_cholestrol', prescribed_action='$up_prescribed_action', prescribed_medication='$up_prescribed_medication' WHERE phone_number = '$id'");

                  echo "<script>alert('Record has been updated');</script>";
                }
              ?>
              <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body py-3 py-md-0">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="mb-2">Edit User Information</h3>
                        <p class="pt-1">Updating user details will receive a privacy audit.</p>
                      </div>
                      <form id="editUserForm" class="row g-4" onsubmit="return false" action="" method="post">
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserEmail"
                              name="up_diagnosis"
                              class="form-control"
                              autocomplete="off"
                              placeholder="" />
                            <label for="modalEditUserEmail">Diagnosis</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserEmail"
                              name="up_medication"
                              class="form-control"
                              autocomplete="off"
                              placeholder="" />
                            <label for="modalEditUserEmail">Medication</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserFirstName"
                              name="up_uric_acid"
                              class="form-control"
                              autocomplete="off"
                              placeholder="mmol/L" />
                            <label for="modalEditUserFirstName">Uric Acid</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserLastName"
                              name="up_cholestrol"
                              class="form-control"
                              autocomplete="off"
                              placeholder="mmol/L" />
                            <label for="modalEditUserLastName">Cholestrol</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserName"
                              name="up_prescribed_medication"
                              class="form-control"
                              autocomplete="off"
                              placeholder="" />
                            <label for="modalEditUserName">Presribed Medication</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserName"
                              name="up_prescribed_action"
                              class="form-control"
                              autocomplete="off"
                              placeholder="" />
                            <label for="modalEditUserName">Presribed Action</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserEmail"
                              name="up_BP_systolic"
                              class="form-control"
                              autocomplete="off"
                              placeholder="mmHg" />
                            <label for="modalEditUserEmail">Blood Preasure Systolic</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserEmail"
                              name="up_BP_diastolic"
                              class="form-control"
                              autocomplete="off"
                              placeholder="mmHg" />
                            <label for="modalEditUserEmail">Blood Preasure Diastolic</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditTaxID"
                              name="up_BP_pulse"
                              class="form-control"
                              autocomplete="off"
                              placeholder="mmHg" />
                            <label for="modalEditTaxID">Blood Preasure Pulse</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserEmail"
                              name="up_GC_fasting"
                              class="form-control"
                              autocomplete="off"
                              placeholder="mmol/L" />
                            <label for="modalEditUserEmail">Glucose Fasting</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-floating form-floating-outline">
                            <input
                              type="text"
                              id="modalEditUserEmail"
                              name="up_GC_aftermeal"
                              class="form-control"
                              autocomplete="off"
                              placeholder="mmol/L" />
                            <label for="modalEditUserEmail">Glucose Aftermeal</label>
                          </div>
                        </div>
                        <div class="col-12 text-center">
                          <button type="submit" name="updatebtn" class="btn btn-primary me-sm-3 me-1">Submit</button>
                          <button
                            type="reset"
                            class="btn btn-outline-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Edit User Modal -->

              <!-- Add New Credit Card Modal -->
              <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-simple modal-upgrade-plan">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body pt-md-0 px-0">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="mb-2 pb-1">Upgrade Plan</h3>
                        <p>Choose the best plan for user.</p>
                      </div>
                      <form id="upgradePlanForm" class="row g-3 d-flex align-items-center" onsubmit="return false">
                        <div class="col-sm-9">
                          <div class="form-floating form-floating-outline">
                            <select id="choosePlan" name="choosePlan" class="form-select" aria-label="Choose Plan">
                              <option selected>Choose Plan</option>
                              <option value="standard">Standard - $99/month</option>
                              <option value="exclusive">Exclusive - $249/month</option>
                              <option value="Enterprise">Enterprise - $499/month</option>
                            </select>
                            <label for="choosePlan">Choose Plan</label>
                          </div>
                        </div>
                        <div class="col-sm-3 d-flex align-items-end">
                          <button type="submit" class="btn btn-primary">Upgrade</button>
                        </div>
                      </form>
                    </div>
                    <hr class="mx-md-n5 mx-n3" />
                    <div class="modal-body pb-md-0 px-0">
                      <h6 class="mb-0">User current plan is standard plan</h6>
                      <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex justify-content-center me-2 mt-3">
                          <sup class="h5 pricing-currency pt-1 mt-3 mb-0 me-1 text-primary">$</sup>
                          <h1 class="fw-bold display-3 mb-0 text-primary">99</h1>
                          <sub class="h5 pricing-duration mt-auto mb-2">/month</sub>
                        </div>
                        <button class="btn btn-label-danger cancel-subscription mt-3">Cancel Subscription</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              <!--/ Add New Credit Card Modal -->

              <!-- /Modal -->
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
                    , made with <span class="text-danger">❤️</span> by
                    <a href="https://pixinvent.com" target="_blank" class="footer-link fw-medium">Pixinvent</a>
                  </div>
                  <div>
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://demos.pixinvent.com/materialize-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
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
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/moment/moment.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/select2/select2.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="../materializeadmin/html-version/materializehtml/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../materializeadmin/html-version/materializehtml/assets/js/modal-edit-user.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/js/app-user-view.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/js/app-user-view-account.js"></script>
  </body>
</html>
