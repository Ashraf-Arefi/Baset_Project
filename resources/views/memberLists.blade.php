@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ __('لیست اعضا') }}
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> {{ __('خانه') }}</a></li>
                    <li class="active">{{ __('لیست اعضا') }}</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container table-responsive">
                    <h1></h1>
                    <div class="serch_mojrem">
                        <form action="{{ route('member.search') }}" method="get">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <select name="type" id="" class="form-control col-lg-2">
                            <option value="dept" @if (isset($type) && $type = 'dept')
                            selected
                            @endif>{{ __('دیپارتمنت') }}</option>
                            <option value="first_name" @if (isset($type) && $type = 'first_name')
                            selected
                            @endif>{{ __('نام') }}</option>>
                            </select>
                            <input type="text" class="form-control col-lg-2" name="keyword" placeholder="{{ __('ورودی') }}" value="" required>
                            <input type="submit" class="btn btn-primary" name="search" value="{{ __('جستجو') }}" class="list_mojrem_btn_serach">
                            <span><span> {{ __('مجموعه') }} {{ count($members) }} {{ __('نفر') }}</span></span>
                            </div>
                            <div class="form-group"></div>
                        </form>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <!-- <th>شماره</th> -->
                            <th>{{ __('نام') }}</th>
                            <th>{{ __('نام خانوادگی') }}</th>
                            <th>{{ __('ایمیل آدرس') }}</th>
                            <th>{{ __('شماره تماس') }}</th>
                            <th>{{ __('دیپارتمنت') }}</th>
                            <th>{{ __('آدرس') }}</th>
                            <th>{{ __('عکس') }}</th>
                            <th>{{ __('ویرایش') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $member->first_name }}</td>
                                <td>{{ $member->last_name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->contact }}</td>
                                <td>{{ $member->dept }}</td>
                                <td>{{ $member->address }}</td>
                                <td>
                                    <a href="{{ asset('/img/member_photos/'.$member->image_name) }}" target="_blank">
                                        <img src="{{ asset('/img/member_photos/'.$member->image_name) }}" alt="" class="img img-responsive img-rounded" width="40px" height="40px">
                                    </a>
                                </td>
                                <td class="">
                                    <a href="{{ route('member.edit',[$member->id]) }}" class="btn btn-primary">{{ __('ویرایش') }}</a>
                                    <a href="{{ route('member.delete',[$member->id]) }}" class="btn btn-danger">{{ __('حذف') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-12 text-center">
                            {{ $members->links() }}
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!--------------------------
         | Your Page Content Here |
         -------------------------->
        <!-- ********************************************************************************* -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection