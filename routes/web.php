<?php
Auth::routes();

Route::resource('posts', 'PostsController');
Route::resource('blog', 'HomeController');

Route::get('/', 'HomeController@index')->name('home');
