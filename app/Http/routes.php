<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// News
Route::get('news', 'NewsController@index');

// Classes
Route::get('classes', 'ClassesController@index');
Route::get('classes/{classe_id}', 'ClassesController@show');
Route::get('classes/{classe_id}/book', 'ClassesController@book');

// Admin
Route::get('admin', 'AdminController@index');
Route::get('admin/news', 'AdminController@news');
Route::get('admin/classes', 'AdminController@classes');
Route::get('admin/users', 'AdminController@users');
Route::get('admin/transactions', 'AdminController@transactions');

// Home / Catchall
Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');
