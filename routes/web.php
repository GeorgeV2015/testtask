<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['admin']], function() {
    Route::get('/', 'DashboardController@index')->name('admin');

    Route::resource('/news', 'NewsController', ['except' => ['show']]);

    Route::resource('/comments', 'CommentsController', ['except' => ['create', 'store', 'show']]);
});

Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{newsSlug}', 'NewsController@show')->name('news.show');

Route::get('/comments', 'CommentsController@index')->name('comments');
Route::post('/comments', 'CommentsController@store');

Route::get('/', function () {
    return view('welcome');
})->name('home');;

Auth::routes();
