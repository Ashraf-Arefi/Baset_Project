@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- ********************************************************************************* -->
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ count($member) }}</h3>

                            <p>{{ __('نفوس دیتابیس') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('member.list') }}" class="small-box-footer">{{ __('اطلاعات بیشتر') }} <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ count($member) }}</h3>

                            <p>{{ __('نفوس اعضا') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <a href="{{ route('member.list') }}" class="small-box-footer">{{ __('اطلاعات بیشتر') }} <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ count($admin) }}</h3>

                            <p>{{ __('تعداد مدیران') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <a href="{{ route('admin.list') }}" class="small-box-footer">{{ __('اطلاعات بیشتر') }} <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-gray">
                        <div class="inner">
                            <h3>{{ count($book) }}</h3>

                            <p>{{ __('تعداد کتاب') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <a href="{{ route('book.list') }}" class="small-box-footer">{{ __('اطلاعات بیشتر') }} <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!--------------------------
    | Your Page Content Here |
    -------------------------->
            <!-- ********************************************************************************* -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection