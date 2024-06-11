<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Вход</title>
    <link rel="canonical" href="https://themeselection.com/item/sneat-free-bootstrap-html-laravel-admin-template/">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/logo.png')); ?>" />



    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/boxicons.css?id=cb2abd8588b1a15b00487f17a31ce6dd')); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/core.css?id=55d83a3f34ab8f93237fd536f4357bbe')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/theme-default.css?id=ad02d36a38b47334e07e25d3b9cd8393')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo.css?id=69dfc5e48fce5a4ff55ff7b593cdf93d')); ?>" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css?id=858f7088631c9c1fe122f541dcad3a4d')); ?>" />

    <!-- Vendor Styles -->


    <!-- Page Styles -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-auth.css')); ?>">

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

<!-- Content -->
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">

                    <?php if(session('danger')): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo e(session('danger')); ?> <span id="countdown"></span>
                        </div>
                    <?php endif; ?>
                    <form id="formAuthentication" class="mb-3" action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Номер телефона</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Введите номер телефона" autofocus>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Пароль</label>
                                <a href="<?php echo e(route('sendCode')); ?>">
                                    <small>Забыли пароль?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">

                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button id="signin-btn" class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- /Register -->
    </div>
</div>
<!--/ Content -->

<!--/ Layout Content -->
<?php if(session('time')): ?>
    <script>
        function countdown(seconds) {
            var countdownElement = document.getElementById('countdown');
            var countdownInterval = setInterval(function() {
                if (seconds <= 0) {
                    clearInterval(countdownInterval);
                    countdownElement.textContent = "Время истекло";
                    document.getElementById('signin-btn').disabled = false; // Включить кнопку
                    return;
                }
                var minutes = Math.floor(seconds / 60);
                var remainingSeconds = seconds % 60;
                countdownElement.textContent = minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds;
                seconds--;
            }, 1000);
        }

        countdown(<?php echo e(session('time')); ?> * 60);

        document.getElementById('signin-btn').disabled = true;
    </script>
<?php endif; ?>


<!-- Include Scripts -->
<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js?id=d6912bbf9b29bbcc108b2a81baac5fb1')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/popper/popper.js?id=f5aae921cb2529b79f3186eebddf5a32')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/bootstrap.js?id=95bd886657816de98a4973e6fa33679a')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=7c36751c61f8450005e3e6f02bb84ab6')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/menu.js?id=d20d4c6cb4af8e665da4e49ce564dd18')); ?>"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset('assets/js/main.js?id=0c91cceb5195b308a36d5ac021b16464')); ?>"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

</body>

</html>
<?php /**PATH C:\xampp\htdocs\dehqon\resources\views\auth\index.blade.php ENDPATH**/ ?>