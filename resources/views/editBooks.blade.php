@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ __('ویرایش کردن کتاب') }}</h1>
            <ol class="breadcrumb">
                <li><a >{{ __('خانه') }}</a></li>
                <li class="active">{{ __('ویرایش کتاب') }}</li>
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
                        <form action="{{ route('book.edit',[$book->id]) }}" method="post">
                            {{ csrf_field() }}
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <label for="title">{{ __('عنوان') }}</label>
                                            <input type="text" name="title" placeholder="{{ __('عنوان') }}"   value="{{ $book->bookTitle }}">
                                        </div>

                                        <div class="form-group full col-lg-6">
                                            <label for="edition">{{ __('چاپ') }}</label>
                                            <input type="text" name="edition" placeholder="{{ __('چاپ') }}"   value="{{ $book->edition }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <select  id="sel1" class="form-control" name="cat">
                                                <option>--Select Category--</option>
                                                @foreach($cats as $cat)
                                                    <option value="{{ $book->catId }}" @if ($cat->id = $book->catId)
                                                        selected
                                                    @endif> {{$cat->catName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group full col-lg-6">
                                            <label for="author_name">{{ __('نویسنده') }}</label>
                                            <input type="text" name="author_name" placeholder="{{ __('نویسنده') }}"  value="{{ $book->author_name }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <label for="publisher_name">{{ __('انتشارات') }}</label>
                                            <input type="text" name="publisher_name" placeholder="{{ __('انتشارات') }}"   value="{{ $book->publisher_name }}">
                                        </div>

                                        <div class="form-group full col-lg-6">
                                            <label for="totalAvail">{{ __('موجودی') }}</label>
                                            <input type="number" name="totalAvail" placeholder="{{ __('موجودی') }}"  value="{{ $book->totalAvail }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-12">
                                            <button class="btn btn-primary btn-block" type="submit">{{ __('ویرایش کردن کتاب') }}</button></div>
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
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <!-- ********************************************************************************* -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection