<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>کتاب خانه</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.css') }}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('/css/rtl.css') }}">
    <!-- persian Date Picker -->
    <link rel="stylesheet" href="{{ asset('/css/persian-datepicker-0.4.5.min') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ asset('/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/css/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css"> -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('/css/jquery-jvectormap.css') }}">
    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css"> -->
    <!-- bootstrap datepicker -->
    <!-- <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/kamadatepicker.css') }}"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="http://localhost/criminal/assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/AdminLTE.css') }}">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">{{ __('پنل') }}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>{{ __('صفحه مدیریت') }}</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('/img/admin_photos/'.Auth::user()->image_name) }}"
                                 class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('/img/admin_photos/'.Auth::user()->image_name) }}"
                                     class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    <small>
                                            {{ __('مدیریت')}}
                                    </small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">{{ __('پروفایل') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat">{{ __('خروج') }}</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ __('زبان') }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route("lang", 'fa') }}">دری</a></li>
                            <li><a href="{{ route("lang", 'pa') }}">پشتو</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel" >
                <div class="pull-right image">
                    <img src="{{ asset('/img/admin_photos/'.Auth::user()->image_name) }}" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-right info">
                    <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </p>
                    <!-- Status -->
                    <a href="{{ route('admin.profile') }}"><i class="fa fa-circle text-success "></i>
                        {{ __('آنلاین') }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">{{ __('عنوان') }}</li>
                <!-- Optionally, you can add icons to the links -->

                <li class=""><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>
                        <span>{{ __('داشبورد') }}</span></a>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-user "></i> <span>{{ __('مدیران') }}</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('admin.add') }}"><i class="fa fa-plus"></i>
                                <span>{{ __('اضافه کردن مدیر') }}</span></a>
                        </li>
                        <li class=""><a href="{{ route('admin.list') }}"><i class="fa fa-list"></i>
                                <span>{{ __('لیست مدیران') }}</span></a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-book "></i> <span>{{ __('کتاب ها') }}</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('book.add') }}"><i class="fa fa-plus"></i>
                                <span>{{ __('اضافه کردن کتاب') }}</span></a></li>
                        <li class=""><a href="{{ route('book.list') }}"><i class="fa fa-list"></i><span>{{ __('لیست کتاب ها') }}</span></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-bookmark "></i> <span>{{ __('کتگوری ها') }}</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('category.add') }}"><i class="fa fa-plus"></i>
                                <span>{{ __('اضافه کردن کتگوری') }}</span></a></li>
                        <li class=""><a href="{{ route('category.list') }}"><i class="fa fa-list"></i><span>{{ __('لیست کتگوری ها') }}</span></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-users "></i> <span>{{ __('اعضا') }}</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class=""><a href="{{ route('member.add') }}"><i class="fa fa-plus"></i><span>{{ __('اضافه کردن عضو') }}</span></a>
                        </li>
                        <li class=""><a href="{{ route('member.list') }}"><i class="fa fa-list"></i><span>{{ __('لیست اعضا') }}</span></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-address-book-o "></i> <span>{{ __('کتاب های قرض') }}</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('issue.add') }}"><i class="fa fa-plus"></i>
                                <span>{{ __('قرض کتاب') }}</span></a></li>
                        <li class=""><a href="{{ route('issue.list') }}"><i class="fa fa-list"></i><span>{{ __('لیست کتابهای قرض') }}</span></a>
                        </li>
                    </ul>
                </li>

                <li class=""><a href="{{ route('returnBook.add') }}"><i class="fa fa-arrow-circle-left"></i>
                        <span>{{ __('برگشت کتاب ها') }}</span></a></li>
                <li class="active" id="about"><a href="{{ route('admin.about') }}"><i class="fa fa-phone"></i> <span>{{ __('درباره ما') }}</span></a>
                </li>
                <li class=""><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> <span>{{ __('خروج از سیستم') }}</span></a>
                </li>
            </ul>
            <!-- /.sidebar-menu -->

        </section>
        <!-- /.sidebar -->
    </aside>  <!-- Content Wrapper. Contains page content -->


@yield('content')
<!-- Main Footer -->
    <footer class="main-footer text-left">
        <strong>Copyright &copy; 2019- 2019 <a href="http://www.facebook.com/hejran eshaqzai">عبدالباسط اسحاقزی</a></strong>
    </footer>
</div>

<!-- jQuery 3 -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<!-- <script src="http://localhost/criminal/assets/js/icheck.min.js"></script> -->
<!-- ×××××××××××××××××××××××××××××××××××××× -->
<!-- jQuery 3 -->
<!-- jQuery UI 1.11.4 -->
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
