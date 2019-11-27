@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ __('اضافه کردن مدیر جدید') }}</h1>
            <ol class="breadcrumb">
                <li><a >{{ __('خانه') }}</a></li>
                <li class="active">{{ __('مدیر جدید') }}</li>
            </ol>
        </section>

        <!-- start the form the add the mojrem info-->
        <div class="container">
            <div class="row main-content">
                <div class="row">
                    <div class="col-lg-0"></div>
                    <div class="col-lg-8">
                        @if ($errors)
                            @foreach ($errors as $error)
                                <div class="alert alert-warning">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route('admin.add') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <label for="first_name">{{ __('نام') }}</label>
                                            <input type="text" name="first_name" placeholder="{{ __('نام') }}"   value="">
                                        </div>

                                        <div class="form-group full col-lg-6">
                                            <label for="last_name">{{ __('نام خانوادگی') }}</label>
                                            <input type="text" name="last_name" placeholder="{{ __('نام خانوادگی') }}"   value="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <label for="username">{{ __('نام کاربری') }}</label>
                                            <input type="text" name="username" placeholder="{{ __('نام کاربری') }}"   value="">
                                        </div>

                                        <div class="form-group full col-lg-6">
                                            <label for="">{{ __('رمز عبور') }}</label>
                                            <input type="password" name="password" placeholder="{{ __('رمز عبور') }}"  value="">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group col-lg-6">
                                            <label class="custom-file-upload">
                                                <input type="file" id="file" onchange="run_show();" name="admin_photo"/>
                                                <span id="priv"></span>
                                                <i class="fa fa-cloud-upload" id="p_text">{{ __('انتخاب عکس') }}</i>
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-12">
                                            <button class="btn btn-primary btn-block" type="submit">{{ __('اضافه کردن مدیر') }}</button></div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div><!--end of row-->
            </div><!--end of container-->
        </div><!--end of content-->

        <script src="{{ asset('/js/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function(){
                function show(input) {
                    if(input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload  = function(e) {
                            $('#priv').html("<img src='"+e.target.result+"' width='140' style='margin-bottom:100px;'>");
                        }
                        reader.readAsDataURL(input.files[0]);

                    }
                }
                $('#file').change(function(){
                    show(this);
                    $('#p_text').hide();
                });
            });
        </script>

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <!-- ********************************************************************************* -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection