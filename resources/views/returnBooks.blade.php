@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ __('تحویل کتاب') }}</h1>
            <ol class="breadcrumb">
                <li><a >{{ __('خانه') }}</a></li>
                <li class="active">{{ __('تحویل کتاب') }}</li>
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
                        <form action="{{ route('returnBook.add') }}" method="post">
                            {{ csrf_field() }}
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <label for="memId">{{ __('شخص مورد نظر') }}</label>
                                            <select  id="sel1" class="form-control" name="memId">
                                                <option>--{{ __('انتخاب شخص مورد نظر') }}--</option>
                                                @foreach($members as $member)
                                                    <option value="{{ $member->id }}"> {{$member->first_name}} {{$member->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group full col-lg-6">
                                            <label for="bookId">{{ __('کتاب مورد نظر') }}</label>
                                            <select  id="sel1" class="form-control" name="bookId">
                                                <option>--{{ __('انتخاب کتاب مورد نظر') }}--</option>
                                                @foreach($books as $book)
                                                    <option value="{{ $book->id }}">{{$book->bookTitle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-6">
                                            <label for="returnDate">{{ __('تاریخ برگشت') }}</label>
                                            <input type="date" name="returnDate" placeholder="{{ __('تاریخ برگشت') }}" required value="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group full col-lg-12">
                                            <button class="btn btn-primary btn-block" type="submit">{{ __('برگشت کتاب') }}</button></div>
                                    </td>
                                </tr>
                            </table>
                        </form>
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