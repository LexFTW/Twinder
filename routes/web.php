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
Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/post/create', 'Posts\PostController@store')->name('post.create')->middleware('auth');
Route::post('/post/like/store', 'Posts\PostController@like')->name('post.like.store');
Route::post('/post/retwind/store', 'Posts\PostController@retweet')->name('post.retwind.store');
