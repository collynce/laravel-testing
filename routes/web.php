<?php
Auth::routes();

Route::resource('posts', 'PostsController');
Route::resource('blog', 'HomeController');

Route::get('/', 'HomeController@index')->name('home');
Route::get('posts', 'PostsController@index')->name('posts');
Route::get('search', 'PostsController@fetchCategory')->name('search');
