<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UserController@home')->name('home');

// Admins Auth
Route::get('/admin/login', 'UserController@login')->name('login');
Route::post('/admin/login', 'UserController@doLogin')->name('post.login');

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {

    Route::get('/logout', 'UserController@logout')->name('logout'); // Logout

    Route::get('/list_admin','UserController@index')->name('admin.list');
    Route::get('/add_user', 'UserController@create')->name('admin.add');
    Route::post('/add_user', 'UserController@store')->name('admin.store');
    Route::get('/delete_admin/{id}', 'UserController@destroy')->name('admin.delete');

//    Profile

    Route::get('/profile','UserController@profile')->name('admin.profile');
    Route::post('/profile','UserController@profile_update')->name('admin.update.profile');


//    About Us
    Route::get('/about', 'UserController@about')->name('admin.about');

//    Books Route
    Route::get('/list_books', 'BooksController@index')->name('book.list');
    Route::get('/add_book', 'BooksController@create')->name('book.add');
    Route::post('/add_book', 'BooksController@store')->name('book.add');
    Route::get('/delete_book/{id}', 'BooksController@destroy')->name('book.delete');
    Route::get('/edit_book/{id}', 'BooksController@edit')->name('book.edit');
    Route::post('/edit_book/{id}', 'BooksController@update')->name('book.edit');

    Route::get('/search_book', 'BooksController@search')->name('book.search');

//   Member Routes
    Route::get('/add_member', 'MemberController@create')->name('member.add');
    Route::post('/add_member', 'MemberController@store')->name('member.add');
    Route::get('/list_member', 'MemberController@index')->name('member.list');
    Route::get('/edit_member/{id}', 'MemberController@edit')->name('member.edit');
    Route::post('/edit_member/{id}', 'MemberController@update')->name('member.edit');
    Route::get('/delete_member/{id}', 'MemberController@destroy')->name('member.delete');

    Route::get('/search_member', 'MemberController@search')->name('member.search');


//    Languages
    Route::get('/lang/{language}', 'UserController@changeLanguage')->name('lang');


//    Issue Books Route
    Route::get('/add_issueBook','BooksIssuedController@create')->name('issue.add');
    Route::post('/add_issueBook','BooksIssuedController@store')->name('issue.add');
    Route::get('/list_issueBook','BooksIssuedController@index')->name('issue.list');
    Route::get('/delete_issueBook/{id}','BooksIssuedController@destroy')->name('issue.delete');
    Route::get('/edit_issueBook/{id}','BooksIssuedController@edit')->name('issue.edit');
    Route::post('/edit_issueBook/{id}','BooksIssuedController@update')->name('issue.edit');

//    Return Books Route
    Route::get('/add_returnBook','BooksReturnedController@create')->name('returnBook.add');
    Route::post('/add_returnBook','BooksReturnedController@store')->name('returnBook.add');

//    Categories Route
    Route::get('/add_category','BooksCategoryController@create')->name('category.add');
    Route::post('/add_category','BooksCategoryController@store')->name('category.store');
    Route::get('/list_category','BooksCategoryController@index')->name('category.list');
    Route::get('/delete_category/{id}','BooksCategoryController@destroy')->name('category.delete');
    Route::get('/edit_category/{id}','BooksCategoryController@edit')->name('category.edit');
    Route::post('/edit_category/{id}','BooksCategoryController@update')->name('category.update');
});


