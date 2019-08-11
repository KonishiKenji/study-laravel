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
// ======================================================================
Route::get('/', 'LoginController@index');
Route::get('/home', 'HomeController@index')->name('home');

// ======================================================================
// Auth::routes();
// Email Verification機能を使えるようにするため下記に変更
Auth::routes(['verify' => true]);

// For BooksController - Rent_logsController
// 本登録ユーザーだけ表示できるページ
Route::middleware('verified')->group(function() {
    // For BooksController - Rent_logsController
    Route::get('/libraryHome', 'BooksController@index');
    Route::get('/libraryBorrowingList', 'BooksController@borrowingList');
    Route::get('/libraryBookSignUp', 'BooksController@bookSignUp');
    Route::get('/libraryBookEdit/{id}', 'BooksController@bookEdit');
    Route::get('/libraryBorrowHistory', 'Rent_logsController@index');
    
    Route::post('/library/bookBorrow', 'BooksController@bookBorrow');
    Route::post('/library/bookReturn', 'BooksController@bookReturn');
    Route::post('library/bookRegister', 'BooksController@bookRegister');
    Route::post('library/bookUpdate', 'BooksController@bookUpdate');
    Route::post('library/bookDelete/{id}', 'BooksController@bookDelete');
    
});

