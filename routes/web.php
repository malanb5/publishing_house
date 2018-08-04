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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'books', 'as' => 'books.'], function (){
    Route::get('/', 'BooksController@index')->name('index');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.books.'], function (){
    Route::get('/books', 'BooksController@tableIndex')->name('index');
});
