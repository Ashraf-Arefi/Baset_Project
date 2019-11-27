@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h1>{{ __('پروفایل مدیر') }}</h1>
        </div>
        <div class="container-fluid content" >
            <div class="container">
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form onchange="form_changed()" method="post" action="{{ route('admin.update.profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-lg-4 col-md-4 col-sm-4 change_profile_section">
                            <div class="form-group">
                                <label for="email">{{ __('نام') }}</label>
                                <input type="text" class="form-control" id="email" name="first_name" value="{{ Auth::user()->first_name }}">
                            </div>
                            <div class="form-group">
                                <label for="lastname">{{ __('تخلص') }}</label>
                                <input type="text" class="form-control" id="lastname" name="last_name" value="{{ Auth::user()->last_name }}">
                            </div>
                            <div class="form-group">
                                <label for="username">{{ __('نام کاربری(انگلیسی باشد)') }}</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}">
                            </div>


                            <div class="form-group">
                                <label for="password">{{ __('رمزعبور (تغییر رمز دلخواه است)') }}</label>
                                <!-- <input  name="password" id="password1" type="password" class="form-control"> -->
                                <input type="password" class="form-control" id="password1" name="password" value="">
                            </div>
                            <div class="form-group">
                                <label for="password" id="conf">{{ __('تکرار رمز عبور') }}</label>
                                <input type="password" class="form-control" id="password2" onkeyup="check_conf();" name="confirm_password" value="">
                                <!-- <input  name="confirm_password" id="password2" type="password" class="form-control"  onkeyup="check_conf();"> -->
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 photo_profile ">
                            <div>
                                <a href="{{ asset('/img/admin_photos/'.Auth::user()->image_name) }}" target="_blank">
                                    <img class="img-thumbnail img-responsive profile_photo" src="{{ asset('/img/admin_photos/'.Auth::user()->image_name) }}" alt="profile photo" width="200">
                                </a>
                                <div class="form-group">

                                    <label class="btn_change_photo btn btn-primary" id="myfile" style=" margin-right:30px;margin-top:10px;" >
                                        <input type="file" name="admin_photo"  onchange="do_change();form_changed();">
                                        {{ __('انتخاب عکس جدید') }}
                                    </label>
                                    <span id="myfile1" style="margin-top:10px;">

                                    </span>
                                </div>
                            </div>
                        </div><!--end of photo_profile-->
                        <div class="col-lg-10">
                            <div class="form-group">
                            </div>
                            <button type="submit" id="submit_btn" class="btn btn-block btn-primary btn_save_changes" style="display:none;">{{ __('ذخیره تغییرات') }}</button>
                        </div>
                    </form>
                </div><!--end of row-->
            </div><!--end of container-->
        </div>

        <script>
            //if the input type file changes do the changes
            function do_change() {
                document.getElementById('myfile1').innerHTML = "{{ __('عکس انتخاب شد!') }}";
            }
            //if form changed make the submit button allow to post
            function form_changed() {
                document.getElementById('submit_btn').style.display = 'block';
                // alert(2);
            }
            function check_conf() {
                let val1 = document.getElementById('password1').value;
                let val2 = document.getElementById('password2').value;
                //alert('val1:'+val1+' val2:'+val2);
                if(val1 != val2) {
                    document.getElementById('conf').style.color = 'red';
                }else {
                    document.getElementById('conf').style.color = 'green';
                }
            }
        </script>      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop