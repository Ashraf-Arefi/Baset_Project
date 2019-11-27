@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ __('لیست کتگوری ها') }}
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> {{ __('خانه') }}</a></li>
                    <li class="active">{{ __('لیست کتگوری ها') }}</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container table-responsive">
                    <h1></h1>
                    <div class="serch_mojrem">
                        <form action="" method="get">
                            {{ csrf_field() }}
                            <div class="form-group"></div>
                        </form>
                    </div>
                    @if (session('catSuccess'))
                        <div class="alert alert-success text-center">
                            {{ session('catSuccess') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <!-- <th>شماره</th> -->
                            <th>{{ __('شماره') }}</th>
                            <th>{{ __('اسم کتگوری') }}</th>
                            <th>{{ __('ویرایش') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($cats)? $counter = 1:  '')
                            @foreach ($cats as $cat)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $cat->catName }}</td>
                                    <td class="">
                                        <a href="{{ route('category.edit',[$cat->id]) }}" class="btn btn-primary">{{ __('ویرایش') }}</a>
                                        <a href="{{ route('category.delete',[$cat->id]) }}" class="btn btn-danger">{{ __('حذف') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-12 text-center">
                            {{ $cats->links() }}
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