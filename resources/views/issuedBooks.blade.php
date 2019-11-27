@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ __('لیست کتاب های قرض') }}
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> {{ __('خانه') }}</a></li>
                    <li class="active">{{ __('لیست کتاب های قرض شده') }}</li>
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
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <!-- <th>شماره</th> -->
                            <th>{{ __('نام کاربر') }}</th>
                            <th>{{ __('نام کتاب') }}</th>
                            <th>{{ __('تاریخ بردن') }}</th>
                            <th>{{ __('تاریخ آوردن') }}</th>
                            <th>{{ __('ویرایش') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->member->first_name }} {{ $book->member->last_name }}</td>
                                <td>{{ $book->book->bookTitle }}</td>
                                <td>{{ $book->issueDate }}</td>
                                <td>{{ $book->returnDate }}</td>
                                <td class="">
                                    <a href="{{ route('issue.edit',[$book->id]) }}" class="btn btn-primary">{{ __('ویرایش') }}</a>
                                    <a href="{{ route('issue.delete',[$book->id]) }}" class="btn btn-danger">{{ __('حذف') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-12 text-center">
                            {{ $books->links() }}
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