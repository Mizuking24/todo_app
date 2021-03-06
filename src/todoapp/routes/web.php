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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'PostController@index')->name('post');
Route::get('/post/new', 'PostController@new')->name('post.new');
Route::post('/post/create', 'PostController@create')->name('post.create');
Route::get('/post/{id}/show', 'PostController@show')->name('post.show');
Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
Route::post('/post/{id}/update', 'PostController@update')->name('post.update');
Route::post('/post/{id}/destroy', 'PostController@destroy')->name('post.destroy');
