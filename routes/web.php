<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('Guest')->name('guest.')->group(function () {
    Route::get('/', 'BlogController@index')->name('posts.index');
    Route::get('/{post}', 'BlogController@show')->name('posts.show');
    Route::get('/posts-filter/{slug}', 'BlogController@filter_tag')->name('posts.filter_tag');
});

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::resource('posts', 'PostController');
    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
});
