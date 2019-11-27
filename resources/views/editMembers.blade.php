@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ __('ویرایش عضو') }}</h1>
            <ol class="breadcrumb">
                <li><a >{{ __('خانه') }}</a></li>
                <li class="active">{{ __('ویرایش عضو') }}</li>
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
                        <form action="{{ route('member.edit',[$member->id]) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <label for="first_name">{{ __('نام') }}</label>
                                            <input type="text" name="first_name" placeholder="{{ __('نام') }}"   value="{{ $member->first_name }}">
                                        </div>

                                        <div class="form-group full col-lg-6">
                                            <label for="last_name">{{ __('نام خانوادگی') }}</label>
                                            <input type="text" name="last_name" placeholder="{{ __('نام خانوادگی') }}"   value="{{ $member->last_name }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <label for="email">{{ __('ایمیل آدرس') }}</label>
                                            <input type="email" name="email" placeholder="{{ __('ایمیل آدرس') }}"   value="{{ $member->email }}">
                                        </div>

                                        <div class="form-group full col-lg-6">
                                            <label for="contact">{{ __('شماره تماس') }}</label>
                                            <input type="telephone" name="contact" placeholder="{{ __('شماره تماس') }}"  value="{{ $member->contact }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <label for="dept">{{ __('دیپارتمنت') }}</label>
                                            <input type="text" name="dept" placeholder="{{ __('دیپارتمنت') }}"   value="{{ $member->dept }}">
                                        </div>

                                        <div class="form-group full col-lg-6">
                                            <label for="address">{{ __('آدرس') }}</label>
                                            <input type="text" name="address" placeholder="{{ __('آدرس') }}"  value="{{ $member->address }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <div class="col-lg-5 col-md-5 col-sm-5 photo_profile ">
                                        <div>
                                            <a href="{{ asset('/img/member_photos/'.$member->image_name) }}" target="_blank">
                                                <img class="img-thumbnail img-responsive profile_photo" src="{{ asset('/img/member_photos/'.$member->image_name) }}" alt="profile photo" width="200">
                                            </a>
                                            <div class="form-group">

                                                <label class="btn_change_photo btn btn-primary" id="myfile" style=" margin-right:30px;margin-top:10px;" >
                                                    <input type="file" name="member_photo"  onchange="do_change();form_changed();">
                                                    {{ __('انتخاب عکس جدید') }}
                                                </label>
                                                <span id="myfile1" style="margin-top:10px;">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-12">
                                            <button class="btn btn-primary btn-block" type="submit">{{ __('ویرایش عضو') }}</button></div>
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
            function do_change() {
                document.getElementById('myfile1').innerHTML = "{{ __('عکس انتخاب شد!') }}";
            }
            //if form changed make the submit button allow to post
            function form_changed() {
                document.getElementById('submit_btn').style.display = 'block';
                // alert(2);
            }
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