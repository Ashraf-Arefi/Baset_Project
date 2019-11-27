@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ __('لیست کتاب ها') }}
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> {{ __('خانه') }}</a></li>
                    <li class="active">{{ __('لیست کتاب ها') }}</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container table-responsive">
                    <h1></h1>
                    <div class="serch_mojrem">
                        <form action="{{ route('book.search') }}" method="get">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <select name="type" id="" class="form-control col-lg-2">
                                    <option value="bookTitle" @if (isset($type) && $type = 'bookTitle')
                                    selected
                                            @endif>{{ __('عنوان کتاب') }}</option>
                                    <option value="author_name" @if (isset($type) && $type = 'author_name')
                                    selected
                                            @endif>{{ __('نام نویسنده') }}</option>
                                </select>
                                <input type="text" class="form-control col-lg-2" name="keyword" placeholder="{{ __('ورودی') }}" value="">
                                <input type="submit" class="btn btn-primary" name="search" value="{{ __('جستجو') }}" class="list_mojrem_btn_serach">
                                <span><span> {{ __('مجموعه') }} {{ count($books) }} {{ __('نفر') }}</span></span>
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
                            <th>{{ __('عنوان') }}</th>
                            <th>{{ __('چاپ') }}</th>
                            <th>{{ __('کتگوری') }}</th>
                            <th>{{ __('نویسنده') }}</th>
                            <th>{{ __('انتشارات') }}</th>
                            <th>{{ __('موجودی') }}</th>
                            <th>{{ __('ویرایش') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($books as $book )
                            <tr>
                                <td>{{ $book->bookTitle }}</td>
                                <td>{{ $book->edition }}</td>
                                <td>{{ $book->category->catName }}</td>
                                <td>{{ $book->author_name }}</td>
                                <td>{{ $book->publisher_name }}</td>
                                <td>{{ $book->totalAvail }}</td>
                                <td class="">
                                    <a href="{{ route('book.edit',[$book->id]) }}" class="btn btn-primary">{{ __('ویرایش') }}</a>
                                    <a href="{{ route('book.delete',[$book->id]) }}" class="btn btn-danger">{{ __('حذف') }}</a>
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