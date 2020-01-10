<?php
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('posts', 'PostsController');

});


Route::get('/', 'HomeController@index')->name('home');
