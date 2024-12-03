<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/logo.png')); ?>">

    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/boxicons.css?id=cb2abd8588b1a15b00487f17a31ce6dd')); ?>"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/core.css?id=55d83a3f34ab8f93237fd536f4357bbe')); ?>"/>
    <link rel="stylesheet"
          href="<?php echo e(asset('assets/vendor/css/theme-default.css?id=ad02d36a38b47334e07e25d3b9cd8393')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo.css?id=69dfc5e48fce5a4ff55ff7b593cdf93d')); ?>"/>
    <!-- Vendors CSS -->
    <link rel="stylesheet"
          href="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css?id=858f7088631c9c1fe122f541dcad3a4d')); ?>"/>

    <!-- Vendor Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/apex-charts/apex-charts.css')); ?>">


    <!-- Page Styles -->

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
    <script src="<?php echo e(asset('assets/vendor/js/helpers.js')); ?>"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js') }}"></script>
</head>

<body>


<!-- Layout Content -->
<div class="layout-wrapper layout-content-navbar ">
    <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">

            <!-- ! Hide app brand if navbar-full -->
            <div class="app-brand demo">
                <a href="http://sneat.my" class="app-brand-link">
                      <span class="app-brand-logo demo">
                            <img src="<?php echo e(asset('assets/img/logo.png')); ?>" width="25px" alt="">
                      </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">dehqon pro</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1 overflow-auto">

                <!-- Организации -->
                <li class="menu-item <?php echo e(Request::segment(2) === 'chats' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('chats.index')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-message'></i>
                        <div>Чаты</div>
                    </a>
                </li>

                <?php if(Auth::user()->role == 1): ?>

                <!-- Пользователи -->
                <li class="menu-item <?php echo e(Request::segment(2) === 'users' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('users.index')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-user'></i>
                        <div>Пользователи</div>
                    </a>
                </li>
                <!-- Культуры -->
                <li class="menu-item <?php echo e(Request::segment(2) === 'cultures' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('cultures.index')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bxs-pear'></i>
                        <div>Культуры</div>
                    </a>
                </li>
                <!-- Ирригации -->
                <li class="menu-item <?php echo e(Request::segment(2) === 'irrigations' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('irrigations.index')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-leaf'></i>
                        <div>Ирригация</div>
                    </a>
                </li>
                <!-- Агромаркеты -->
                <li class="menu-item <?php echo e(Request::segment(2) === 'agro-markets' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('agroMarkets.index')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-lemon'></i>
                        <div>Агромаркеты</div>
                    </a>
                </li>
                <!-- Агрокредиты -->
                <li class="menu-item <?php echo e(Request::segment(2) === 'agro-credits' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('agroCredits.index')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-money'></i>
                        <div>Агрокредиты</div>
                    </a>
                </li>
                <!-- Организации -->
                <li class="menu-item <?php echo e(Request::segment(2) === 'organizations' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('organizations.index')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bxs-bank'></i>
                        <div>Организации</div>
                    </a>
                </li>

                <!-- Поля -->
                <li class="menu-item fields-submenu <?php echo e(Request::segment(2) === 'fields' ||
                            Request::segment(2) === 'problems' ||
                            Request::segment(2) === 'works' ||
                            Request::segment(2) === 'consumption-categories' ||
                            Request::segment(2) === 'consumption-namings' ||
                            Request::segment(2) === 'consumption-operations' ||
                            Request::segment(2) === 'consumption-production-means' ? 'active open' : ''); ?>">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class='menu-icon tf-icons bx bx-map'></i>
                        <div>Поля</div>
                    </a>
                    <ul class="menu-sub">
                        <!-- Поля -->
                        <li class="menu-item <?php echo e(Request::segment(2) === 'fields' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('fields.index')); ?>" class="menu-link">
                                <div>Поля</div>
                            </a>
                        </li>
                        <!-- Проблемы -->
                        <li class="menu-item <?php echo e(Request::segment(2) === 'problems' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('problems.index')); ?>" class="menu-link">
                                <div>Проблемы</div>
                            </a>
                        </li>
                         <!-- Расходы -->
                        <li class="menu-item consumption-submenu <?php echo e(Request::segment(2) === 'consumption-categories' ||
                                        Request::segment(2) === 'consumption-namings' ||
                                        Request::segment(2) === 'consumption-operations' ||
                                        Request::segment(2) === 'consumption-production-means' ||
                                        Request::segment(2) === 'consumptions' ? 'active open' : ''); ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <div>Расходы</div>
                            </a>
                            <ul class="menu-sub">
                                <!-- Категории расходов -->
                                <li class="menu-item <?php echo e(Request::segment(2) === 'consumption-categories' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('consumptionCategories.index')); ?>" class="menu-link">
                                        <div>Категории расходов</div>
                                    </a>
                                </li>
                                <!-- Наименование расходов -->
                                <li class="menu-item <?php echo e(Request::segment(2) === 'consumption-namings' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('consumptionNamings.index')); ?>" class="menu-link">
                                        <div>Наименование расходов</div>
                                    </a>
                                </li>
                                <!-- Операции расходов -->
                                <li class="menu-item <?php echo e(Request::segment(2) === 'consumption-operations' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('consumptionOperations.index')); ?>" class="menu-link">
                                        <div>Операции расходов</div>
                                    </a>
                                </li>
                                <!-- Средства производства -->
                                <li class="menu-item <?php echo e(Request::segment(2) === 'consumption-production-means' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('consumptionProductionMeans.index')); ?>" class="menu-link">
                                        <div>Средства производства</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Работы -->
                        <li class="menu-item  <?php echo e(Request::segment(2) === 'works' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('works.index')); ?>" class="menu-link">
                                <div>Работы</div>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-item <?php echo e(Request::segment(2) === 'news' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('news.index')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-file'></i>
                        <div>Новости</div>
                    </a>
                </li>

                <li class="menu-item <?php echo e(Request::segment(2) === 'questions' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('questions.index')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-question-mark'></i>
                        <div>Вопросы</div>
                    </a>
                </li>

                <!-- Переработки -->
                <li class="menu-item fields-submenu <?php echo e(Request::segment(2) === 'conversion-categories' ||
                        Request::segment(2) === 'conversion-types' ||
                        Request::segment(2) === 'conversion-namings' ||
                        Request::segment(2) === 'conversion-operations' ||
                        Request::segment(2) === 'conversion-production-means' ? 'active open' : ''); ?>">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class='menu-icon tf-icons bx bx-recycle'></i>
                        <div>Переработки</div>
                    </a>
                    <ul class="menu-sub">
                        <!-- Категории переработок -->
                        <li class="menu-item <?php echo e(Request::segment(2) === 'conversion-categories' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('conversionCategories.index')); ?>" class="menu-link">
                                <div>Категории переработок</div>
                            </a>
                        </li>
                        <!-- Типы -->
                        <li class="menu-item <?php echo e(Request::segment(2) === 'conversion-types' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('conversionTypes.index')); ?>" class="menu-link">
                                <div>Типы</div>
                            </a>
                        </li>
                        <!-- Наименования -->
                        <li class="menu-item <?php echo e(Request::segment(2) === 'conversion-namings' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('conversionNamings.index')); ?>" class="menu-link">
                                <div>Наименования</div>
                            </a>
                        </li>
                        <!-- Операции -->
                        <li class="menu-item <?php echo e(Request::segment(2) === 'conversion-operations' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('conversionOperations.index')); ?>" class="menu-link">
                                <div>Операции</div>
                            </a>
                        </li>
                        <!-- Средства производства -->
                        <li class="menu-item <?php echo e(Request::segment(2) === 'conversion-production-means' ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('conversionProductionMeans.index')); ?>" class="menu-link">
                                <div>Средства производства</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- Организации -->
                <li class="menu-item">
                    <a href="<?php echo e(route('logoutGet')); ?>" class="menu-link">
                        <i class='menu-icon tf-icons bx bx-log-out'></i>
                        <div>Выйти</div>
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
                                <input type="text" name="q" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Поиск..." value="<?php if(request()->has('q')): ?><?php echo e(request('q')); ?><?php endif; ?>">
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
                                <?php echo e(Auth::user()->name); ?>

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
                <?php echo $__env->yieldContent('content'); ?>
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
<script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js?id=d6912bbf9b29bbcc108b2a81baac5fb1')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/popper/popper.js?id=f5aae921cb2529b79f3186eebddf5a32')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/bootstrap.js?id=95bd886657816de98a4973e6fa33679a')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=7c36751c61f8450005e3e6f02bb84ab6')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/menu.js?id=d20d4c6cb4af8e665da4e49ce564dd18')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset('assets/js/main.js?id=0c91cceb5195b308a36d5ac021b16464')); ?>"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="<?php echo e(asset('assets/js/dashboards-analytics.js')); ?>"></script>
<!-- END: Page JS-->

</body>

</html>
<?php /**PATH /var/www/dehqon/resources/views/admin/layouts/index.blade.php ENDPATH**/ ?>