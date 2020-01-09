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

Route::get('/posts', 'PostsController@index');

Route::post('/add', 'PostsController@store');

Route::put('/edit/{id}', 'PostsController@update');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts', 'PostsController@index');
    Route::post('/add', 'PostsController@store');
    Route::put('/edit/{id}', 'PostsController@update');
});

Route::group(['namespace' => 'Posts'], function () {
    Route::get('/posts', 'PostsController@index');
    Route::post('/add', 'PostsController@store');
    Route::put('/edit/{id}', 'PostsController@update');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
