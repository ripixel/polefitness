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
// News Admin
Route::get('admin/news/new', 'NewsController@create');
Route::post('admin/news/save', 'NewsController@store');
Route::get('admin/news/{news_id}/edit', 'NewsController@edit');
Route::patch('admin/news/{news_id}', 'NewsController@update');
Route::delete('admin/news/{news_id}', 'NewsController@destroy');

// Classes
Route::get('classes', 'ClassesController@index');
Route::get('classes/{classe_id}', 'ClassesController@show');
Route::get('classes/{classe_id}/book', 'ClassesController@book');
// Classes Admin
Route::get('admin/classes/new', 'ClassesController@create');
Route::post('admin/classes/save', 'ClassesController@store');
Route::get('admin/classes/{classe_id}/edit', 'ClassesController@edit');
Route::patch('admin/classes/{classe_id}', 'ClassesController@update');

// Users
// Users Admin
Route::get('admin/users/{user_id}/edit', 'UsersController@edit');
Route::patch('admin/users/{user_id}', 'UsersController@update');

// Transactions Admin
Route::get('admin/transactions/{transaction_id}/edit', 'TransactionsController@edit');
Route::patch('admin/transactions/{transaction_id}', 'TransactionsController@update');

// Memberships Admin
Route::get('admin/memberships/new', 'MembershipsController@create');
Route::post('admin/memberships/save', 'MembershipsController@store');
Route::get('admin/memberships/{membership_id}/edit', 'MembershipsController@edit');
Route::patch('admin/memberships/{membership_id}', 'MembershipsController@update');

// Locations Admin
Route::get('admin/locations/new', 'LocationsController@create');
Route::post('admin/locations/save', 'LocationsController@store');
Route::get('admin/locations/{location_id}/edit', 'LocationsController@edit');
Route::patch('admin/locations/{location_id}', 'LocationsController@update');

// Admin
Route::get('admin', 'AdminController@index');
Route::get('admin/news', 'AdminController@news');
Route::get('admin/classes', 'AdminController@classes');
Route::get('admin/users', 'AdminController@users');
Route::get('admin/transactions', 'AdminController@transactions');
Route::get('admin/memberships', 'AdminController@memberships');
Route::get('admin/locations', 'AdminController@locations');

// Home / Catchall
Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');
