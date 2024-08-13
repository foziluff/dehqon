<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Журнал фермера | Удаление Аккаунта</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cber-tj.com/farmer/public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="https://cber-tj.com/farmer/public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cber-tj.com/farmer/public/admin/dist/css/adminlte.min.css">
</head>
<body class="login-page px-3" style="min-height: 466px;height:100vh;">
<!-- /.login-logo -->
<div class="card" style="margin: 50px auto; border-radius: 30px; padding: 0px 30px; box-shadow: 0 0 30px -20px;">
    <div class="card-body">
        <br>
        <h2 class="text-center"><b>Журнал фермера</b></h2>
        <br>
        <h4>Инструкция по удалению аккаунта</h4>
        <br>
        <p style="font-size:14px;"><b>Шаг 1</b> Войдите в приложение с помощью номера телефона и пароля</p>




        <p style="font-size:14px;"><b>Шаг 2</b> Нажмите на кнопку <span class="text-info">Удаление аккаунта</span></p>

        <p style="font-size:14px;"><b>Шаг 3</b> Получите код на свой номер телефона и введите его чтобы запросить удаление аккаунта</p>

        <p>ИЛИ</p>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('danger'))
            <div class="text-danger mb-3">
                {{ session('danger') }} <span id="countdown"></span>
            </div>
        @endif
        <form action="{{ route('deleteAccount.destroy') }}" method="POST" class="w-75 align-items-center mx-auto d-flex" style="flex-direction: column; justify-content: center" >
            @csrf
            <p>Удалите аккаунт тут:</p>
            <input type="text" class="form-control" style="width: 80%" name="phone" value="{{ old('phone') }}" style="font-size: 16px;" placeholder="992XXXXXXXXX">
            <input type="password" class="form-control my-2" style="width: 80%" name="password" placeholder="Введите пароль" style="font-size: 16px;">
            <input type="submit" class="btn btn-success m-2" value="Удалить аккаунт" style="font-size: 16px; width: 80%">
        </form>




    </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="https://cber-tj.com/farmer/public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cber-tj.com/farmer/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cber-tj.com/farmer/public/admin/dist/js/adminlte.min.js"></script>
@if(session('time'))
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

        countdown({{ session('time') }} * 60);

        document.getElementById('signin-btn').disabled = true;
    </script>
@endif

</body></html>
