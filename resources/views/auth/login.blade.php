
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ورود به صفحه مدیریت</title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.css') }}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Font Awesome -->
    <!-- Ionicons -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body class="hold-transition login-page" id="login_body">
<div class="login-box">
    <div class="login-logo">
        <a href="#" id="login_title"><b>ورود به صفحه مدیریت</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>
        <br>
        <br>
        @if (session('loginError'))
            <div class="alert alert-danger">
                {{ session('loginError') }}
            </div>
        @endif

        <form action="{{ route('post.login') }}" method="post" autocomplete="off">
            {{ csrf_field() }}

            <div class="form-group has-feedback" id="user_id">

                <input name="username" id="username" type="text" class="form-control" placeholder="نام کاربری" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback" id='pass_id'>
                <input  name="password" id="password" type="password" class="form-control" placeholder="رمز عبور" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            {{--<div class="form-group has-feedback" id="pin_id" style="display:none">--}}
            {{--<input  name="pin" id="pin" type="password" class="form-control" placeholder="لطفا پین کد تان را وارد کنید">--}}
            {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
            {{--</div>--}}

            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-block bg-aqua btn-flat" type="submit"> ورود </button>
                </div>
            </div>

        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="{{ asset('/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/js/dashboard.js') }}"></script>


</body>
</html>
