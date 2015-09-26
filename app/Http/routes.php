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

/* PUBLICLY ACCESIBLE ROUTES */
// News
Route::get('news', 'NewsController@index');

// Classes
Route::get('classes', 'ClassesController@index');

// Home / Catchall
Route::post('register', 'HomeController@doRegister');
Route::get('register', 'HomeController@showRegister');
Route::get('logout', 'HomeController@doLogout');
Route::post('login', 'HomeController@doLogin');
Route::get('login', 'HomeController@showLogin');
Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');

/* MUST BE LOGGED IN ROUTES */
Route::group(['middleware' => 'auth'], function() {
	// Users / Profile
	Route::get('profile', 'UserController@profile');
	Route::get('profile/edit', 'UserController@edit');
	Route::patch('profile/edit', 'UserController@updatePublic');
	Route::get('profile/transactions', 'UserController@transactions');
	Route::get('profile/classes', 'UserController@classes');
	Route::get('profile/memberships', 'UserController@memberships');
	Route::get('profile/memberships/{membership_id}', 'UserController@purchaseMembership');
	Route::post('profile/memberships/purchase', 'UserController@purchaseMembershipComplete');
	
	// Classes
	Route::get('classes/{classe_id}', 'ClassesController@show');
	Route::get('classes/{classe_id}/book', 'ClassesController@book');
	Route::get('classes/{classe_id}/book/membership/{membership_id}/', 'ClassesController@bookClassMembership');
	Route::post('classes/book/purchase/membership', 'ClassesController@bookClassMembershipComplete');
	Route::get('classes/{classe_id}/book/payment/{payment_method_id}/', 'ClassesController@bookClassPayment');
	Route::post('classes/book/purchase/payment', 'ClassesController@bookClassPaymentComplete');
});

/* MUST BE ADMIN ROUTES */
Route::group(['middleware' => 'adminOnly'], function() {
	// Classes Admin
	// Class CRUD
	Route::get('admin/classes/new', 'ClassesController@create');
	Route::get('admin/classes/{classe_id}/clone', 'ClassesController@copy');
	Route::post('admin/classes/save', 'ClassesController@store');
	Route::get('admin/classes/{classe_id}/edit', 'ClassesController@edit');
	Route::patch('admin/classes/{classe_id}', 'ClassesController@update');
	Route::delete('admin/classes/{classe_id}', 'ClassesController@destroy');
	// Class Attendees
	Route::get('admin/classes/{classe_id}/edit/attendees', 'ClassesController@editAttendees');
	Route::get('admin/classes/{classe_id}/rejectAttendee/{user_id}', 'ClassesController@rejectAttendee');
	Route::get('admin/classes/{classe_id}/acceptAttendee/{user_id}', 'ClassesController@acceptAttendee');
	
	
	// Users Admin
	Route::get('admin/users/{user_id}/edit', 'UserController@adminEdit');
	Route::patch('admin/users/{user_id}', 'UserController@update');
	Route::get('admin/users/{user_id}/transactions', 'UserController@adminTransactions');
	Route::get('admin/users/{user_id}/classes', 'UserController@adminClasses');
	
	// Transactions Admin
	Route::get('admin/transactions/{transaction_id}/edit/successful', 'TransactionsController@markSuccessful');
	Route::get('admin/transactions/{transaction_id}/edit/failed', 'TransactionsController@markFailed');
	Route::get('admin/transactions/{transaction_id}/edit/rejected', 'TransactionsController@markRejected');
	Route::get('admin/transactions/{transaction_id}/edit/awaiting', 'TransactionsController@markAwaiting');
	
	// Memberships Admin
	Route::get('admin/memberships/new', 'MembershipsController@create');
	Route::post('admin/memberships/save', 'MembershipsController@store');
	Route::get('admin/memberships/{membership_id}/edit/retire', 'MembershipsController@retire');
	Route::get('admin/memberships/{membership_id}/edit/reactive', 'MembershipsController@reactivate');
	
	// Locations Admin
	Route::get('admin/locations/new', 'LocationController@create');
	Route::post('admin/locations/save', 'LocationController@store');
	Route::get('admin/locations/{location_id}/edit', 'LocationController@edit');
	Route::patch('admin/locations/{location_id}', 'LocationController@update');
	
	// Admin
	Route::get('admin', 'AdminController@index');
	// News
	Route::get('admin/news', 'AdminController@news');
	Route::get('admin/news/mine', 'AdminController@newsMine');
	// Classes
	Route::get('admin/classes', 'AdminController@classes');
	Route::get('admin/classes/upcoming', 'AdminController@classesUpc');
	Route::get('admin/classes/mine', 'AdminController@classesMine');
	Route::get('admin/classes/supervising', 'AdminController@classesMineSupervisor');
	Route::get('admin/classes/outstanding', 'AdminController@classesOutstanding');
	Route::get('admin/users', 'AdminController@users');
	// Transactions
	Route::get('admin/transactions', 'AdminController@transactions');
	Route::get('admin/transactions/successful', 'AdminController@transactionsSuccessful');
	Route::get('admin/transactions/awaiting', 'AdminController@transactionsAwaiting');
	Route::get('admin/transactions/failed', 'AdminController@transactionsFailed');
	Route::get('admin/transactions/rejected', 'AdminController@transactionsRejected');
	// Memberships
	Route::get('admin/memberships', 'AdminController@memberships');
	Route::get('admin/memberships/active', 'AdminController@membershipsActive');
	Route::get('admin/memberships/retired', 'AdminController@membershipsRetired');
	// Users
	Route::get('admin/users', 'AdminController@users');
	Route::get('admin/users/admins', 'AdminController@usersAdmins');
	Route::post('admin/users/byname', 'AdminController@userSearch');
	Route::get('admin/users/emails', 'UserController@emailDump');
	// Other
	Route::get('admin/locations', 'AdminController@locations');
	
	// News Admin
	Route::get('admin/news/new', 'NewsController@create');
	Route::post('admin/news/save', 'NewsController@store');
	Route::get('admin/news/{news_id}/edit', 'NewsController@edit');
	Route::patch('admin/news/{news_id}', 'NewsController@update');
	Route::delete('admin/news/{news_id}', 'NewsController@destroy');
});