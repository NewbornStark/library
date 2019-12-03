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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//books
Route::get('/books', 'BooksController@index')->name('books');
Route::get('/book/create', 'BooksController@create')->name('book.create');
Route::post('/book/store', 'BooksController@store')->name('book.store');
Route::put('/book/lend/{id}', 'BooksController@lend')->name('book.lend');
Route::get('/books/borrowed', 'BooksController@borrowed')->name('borrowed.books');

//categories
Route::get('/categories', 'CategoriesController@index')->name('categories');

//users
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/user/create', 'UsersController@create')->name('user.create');
Route::post('/user/store', 'UsersController@store')->name('user.store');