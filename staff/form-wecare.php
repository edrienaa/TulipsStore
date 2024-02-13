<?php

  include '../assets/connection.php';

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

    <title>Dashboard Staff - Tulip's Pharmacy</title>

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
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../materializeadmin/html-version/materializehtml/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

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
              <a href="app-calendar.php" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-calendar-blank-outline"></i>
                <div data-i18n="Calendar">Calendar</div>
              </a>
            </li>
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div data-i18n="Users">Users</div>
              </a>
              <ul class="menu-sub">
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
                <div data-i18n="Invoice">Invoice</div>
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

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="mdi mdi-menu mdi-24px"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- Style Switcher -->
                <li class="nav-item me-1 me-xl-0">
                  <a
                    class="nav-link btn btn-text-secondary rounded-pill btn-icon style-switcher-toggle hide-arrow"
                    href="javascript:void(0);">
                    <i class="mdi mdi-24px"></i>
                  </a>
                </li>
                <!--/ Style Switcher -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../materializeadmin/html-version/materializehtml/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="pages-account-settings-account.html">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../materializeadmin/html-version/materializehtml/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../logout.php" target="_blank">
                        <i class="mdi mdi-logout me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>

            <!-- Search Small Screens -->
            <div class="navbar-search-wrapper search-input-wrapper d-none">
              <input
                type="text"
                class="form-control search-input container-xxl border-0"
                placeholder="Search..."
                aria-label="Search..." />
              <i class="mdi mdi-close search-toggler cursor-pointer"></i>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form Wizard/</span> Numbered</h4>
              <!-- Default -->
              <div class="row">
                <div class="col-12">
                  <h5>Default</h5>
                </div>

                <?php
                  if(isset($_POST["submit"])){
                    $name = $_POST ['name'];
                    $age = $_POST ['age'];
                    $diagnosis = $_POST ['diagnosis'];
                    $medication = $_POST ['medication'];
                    $start_joined = $_POST ['start_joined'];
                    $latest_reading = $_POST ['latest_reading'];
                    $phone_number = $_POST ['phone_number'];
                    $height = $_POST ['height'];
                    $birth_date = $_POST ['birth_date'];
                    $BP_systolic = $_POST ['BP_systolic'];
                    $BP_diastolic = $_POST ['BP_diastolic'];
                    $BP_pulse = $_POST ['BP_pulse'];
                    $GC_fasting = $_POST ['GC_fasting'];
                    $GC_aftermeal = $_POST ['GC_aftermeal'];
                    $uric_acid = $_POST ['uric_acid'];
                    $cholestrol = $_POST ['cholestrol'];
                    $prescribed_action = $_POST ['prescribed_action'];
                    $prescribed_medication = $_POST ['prescribed_medication'];

                    $query = mysqli_query ($connection, "INSERT INTO wecareprogram(name, age, diagnosis, medication, start_joined, latest_reading, phone_number, height, birth_date, BP_systolic, BP_diastolic, BP_pulse, GC_fasting, GC_aftermeal, uric_acid, prescribed_action, presribed_medication)
                    VALUES ('$name', '$age', '$diagnosis', '$medication', '$start_joined', '$latest_reading', '$phone_number', '$height', '$birth_date', '$BP_systolic', '$BP_diastolic', '$BP_pulse', '$GC_fasting', '$GC_aftermeal', '$uric_acid', '$cholestrol', '$prescribed_action', '$prescribed_medication')")
                    or die (mysqli_error());
                  }
                ?>

                <!-- Default Wizard -->
              <form action="" method="post">
                <div class="col-12 mb-4">
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                      <div class="step" data-target="#account-details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-number">01</span>
                            <span class="d-flex flex-column gap-1 ms-2">
                              <span class="bs-stepper-title">Personal Info</span>
                              <span class="bs-stepper-subtitle">Add personal info</span>
                            </span>
                          </span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#personal-info">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-number">02</span>
                            <span class="d-flex flex-column gap-1 ms-2">
                              <span class="bs-stepper-title">Blood Preasure & Glucose </span>
                            </span>
                          </span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#social-links">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-number">03</span>
                            <span class="d-flex flex-column gap-1 ms-2">
                              <span class="bs-stepper-title">Uric Acid & Cholestrol</span>
                            </span>
                          </span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <form onSubmit="return false">
                        <!-- Personal Info -->
                        <div id="account-details" class="content">
                          <div class="content-header mb-3">
                            <h6 class="mb-0">Personal info</h6>
                          </div>
                          <div class="row g-4">
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="text" id="name" class="form-control" name="name" placeholder="johndoe" />
                                <label for="username">Name</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input
                                  type="number"
                                  id="number"
                                  name="age"
                                  class="form-control"
                                  placeholder=""
                                  aria-label="" />
                                <label for="email">Age</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input
                                  type="text"
                                  id="diagnosis"
                                  name="diagnosis"
                                  class="form-control"
                                  placeholder=""
                                  aria-label="" />
                                <label for="email">Diagnosis</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input
                                  type="text"
                                  id="medication"
                                  name="medication"
                                  class="form-control"
                                  placeholder=""
                                  aria-label="" />
                                <label for="email">Medication</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input
                                  type="date"
                                  id="start_joined"
                                  name="start_joined"
                                  class="form-control"
                                  placeholder=""
                                  aria-label="" />
                                <label for="email">Start Joined</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input
                                  type="date"
                                  id="latest_reading"
                                  name="latest_reading"
                                  class="form-control"
                                  placeholder=""
                                  aria-label="" />
                                <label for="email">Latest Reading</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input
                                  type="tel"
                                  id="phone_number"
                                  name="phone_number"
                                  class="form-control"
                                  placeholder="+60"
                                  aria-label="" />
                                <label for="email">Phone Number</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input
                                  type="date"
                                  id="birth_date"
                                  name="birth_date"
                                  class="form-control"
                                  placeholder=""
                                  aria-label="" />
                                <label for="email">Birth Date</label>
                              </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-outline-secondary btn-prev" disabled>
                                <i class="mdi mdi-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="mdi mdi-arrow-right"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- Blood Pressure & Glucose -->
                        <div id="personal-info" class="content">
                          <div class="content-header mb-3">
                            <h6 class="mb-0">Blood Pressure (mmHg)</h6>
                          </div>
                          <div class="row g-4">
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="number" id="BP_systolic" name="BP_systolic" class="form-control" placeholder="" />
                                <label for="first-name">Systolic</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="number" id="BP_diastolic" name="BP_diastolic" class="form-control" placeholder="" />
                                <label for="last-name">Diastolic</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="number" id="BP_pulse" name="BP_pulse" class="form-control" placeholder="" />
                                <label for="last-name">Pulse</label>
                              </div>
                            </div>
                            <h6 class="mb-0">Glucose (mmol/L)</h6>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="number" id="GC_fasting" name="GC_fasting" class="form-control" placeholder="" />
                                <label for="last-name">Fasting</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="number" id="GC_aftermeal" name="GC_aftermeal" class="form-control" placeholder="" />
                                <label for="last-name">Aftermeal</label>
                              </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-outline-secondary btn-prev">
                                <i class="mdi mdi-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="mdi mdi-arrow-right"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- Uric Acid & Cholestrol -->
                        <div id="social-links" class="content">
                          <div class="content-header mb-3">
                            <h6 class="mb-0">Uric Acid & Cholestrol (mmol/L)</h6>
                          </div>
                          <div class="row g-4">
                          <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="number" id="uric_acid" name="uric_acid" class="form-control" placeholder="" />
                                <label for="last-name">Uric Acid</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="number" id="cholestrol" name="cholestrol" class="form-control" placeholder="" />
                                <label for="last-name">Cholestrol</label>
                              </div>
                            </div>
                            <h6>Prescribed Action & Medication</h6>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="text" id="prescribed_action" name="prescribed_action" class="form-control" placeholder="" />
                                <label for="last-name">Prescribed Action</label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-floating form-floating-outline">
                                <input type="text" id="prescribed_medication" name="prescribed_medication" class="form-control" placeholder="" />
                                <label for="last-name">Prescribed Medication</label>
                              </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-outline-secondary btn-prev">
                                <i class="mdi mdi-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-submit" name="submit">Submit</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </form>
                <!-- /Default Wizard -->

              </div>
              <hr class="container-m-nx mb-5" />
              </div>
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
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/select2/select2.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="../materializeadmin/html-version/materializehtml/assets/js/main.js"></script>

    <!-- Page JS -->

    <script src="../materializeadmin/html-version/materializehtml/assets/js/form-wizard-numbered.js"></script>
    <script src="../materializeadmin/html-version/materializehtml/assets/js/form-wizard-validation.js"></script>
  </body>
</html>
