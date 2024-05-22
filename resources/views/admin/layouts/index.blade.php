<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">

    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css?id=cb2abd8588b1a15b00487f17a31ce6dd') }}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css?id=55d83a3f34ab8f93237fd536f4357bbe') }}"/>
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/css/theme-default.css?id=ad02d36a38b47334e07e25d3b9cd8393') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css?id=69dfc5e48fce5a4ff55ff7b593cdf93d') }}"/>
    <!-- Vendors CSS -->
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css?id=858f7088631c9c1fe122f541dcad3a4d') }}"/>

    <!-- Vendor Styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">


    <!-- Page Styles -->

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js') }}"></script>
</head>

<body>


<!-- Layout Content -->
<div class="layout-wrapper layout-content-navbar ">
    <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

            <!-- ! Hide app brand if navbar-full -->
            <div class="app-brand demo">
                <a href="http://sneat.my" class="app-brand-link">
                      <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/logo.png') }}" width="25px" alt="">
                      </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">Farmer</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1 overflow-auto">
                <li class="menu-item {{ Request::segment(2) === 'cultures' ? 'active' : '' }}">
                    <a href="{{ route('cultures.index') }}" class="menu-link">
                        <i class='menu-icon tf-icons bx bxs-pear'></i>
                        <div>Культуры</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(2) === 'fields' ? 'active' : '' }}">
                    <a href="{{ route('fields.index') }}" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-map'></i>
                        <div>Поля</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(2) === 'rotations' ? 'active' : '' }}">
                    <a href="{{ route('rotations.index') }}" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-leaf'></i>
                        <div>Севооборот</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(2) === 'notes' ? 'active' : '' }}">
                    <a href="{{ route('notes.index') }}" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-notepad'></i>
                        <div>Заметки</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(2) === 'problems' ? 'active' : '' }}">
                    <a href="{{ route('problems.index') }}" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-calendar-exclamation'></i>
                        <div>Проблемы</div>
                    </a>
                </li>
            </ul>

        </aside>
        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">

                <!--  Brand demo (display only for navbar-full and hide on below xl) -->

                <!-- ! Not required for layout-without-menu -->
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <form method="get" action="" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" name="q" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Поиск..." value="@if(request()->has('q')){{ request('q') }}@endif">
                            </form>
                        </div>
                    </div>
                    <!-- /Search -->
                    <ul class="navbar-nav flex-row align-items-center ms-auto">

                        <!-- Place this tag where you want the button to render. -->
                        <li class="nav-item lh-1 me-3">
                            <a class="github-button"
                               data-icon="octicon-star" data-size="large" data-show-count="true"
                               aria-label="Star themeselection/sneat-html-laravel-admin-template-free on GitHub">
                                {{ Auth::user()->name }}
                            </a>
                        </li>

                    </ul>
                </div>

            </nav>
            <!-- / Navbar -->
            <!-- END: Navbar-->


            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                <!-- Content -->
                @yield('content')
                <!-- / Content -->


                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->
<!--/ Layout Content -->


<!-- Include Scripts -->
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js?id=d6912bbf9b29bbcc108b2a81baac5fb1') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js?id=f5aae921cb2529b79f3186eebddf5a32') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js?id=95bd886657816de98a4973e6fa33679a') }}"></script>
<script
    src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=7c36751c61f8450005e3e6f02bb84ab6') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js?id=d20d4c6cb4af8e665da4e49ce564dd18') }}"></script>
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/js/main.js?id=0c91cceb5195b308a36d5ac021b16464') }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
<!-- END: Page JS-->

</body>

</html>
