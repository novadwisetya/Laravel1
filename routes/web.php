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
Route::resource('/articles', 'ArticlesController');
Route::resource('comments', 'CommentsController');
Route::post('/postcomment', 'CommentsController@store');
Route::post('/uploadfile','ArticlesController@showUploadFile');
Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('signup', 'UsersController@signup_store')->name('signup.store');
Route::get('login', 'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');

//this routes for check if email user is exist in database
Route::get('forgot-password', 'ReminderController@create')->name('reminders.create');
Route::post('forgot-password', 'ReminderController@store')->name('reminders.store');
//this routes for handle changes password
Route::get('reset-password/{id}/{token}', 'ReminderController@edit')->name('reminders.edit');
Route::post('reset-password/{id}/{token}', 'ReminderController@update')->name('reminders.update');
Route::get('exportExcel/{type}/{id}', 'MaatwebsiteController@exportExcel');
Route::post('importExcel', 'MaatwebsiteController@importExcel');

//use package laravel datatables

Route::get('datatable', ['uses'=>'PostController@datatable']);
Route::get('datatable /getposts', ['as'=>'datatable.getposts','uses'=>'PostController@getPosts']);


