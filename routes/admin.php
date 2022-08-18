<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

//the added namespace for this file at RouteServiceProvider file is App\Http\Controllers\Admin


Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function(){
	
	Route::get('/' , 'DashboardController@index')->name('admin');
	
});

//TODOLIST FIX LOGIN REDIRECT IF AUTHENTICATED Auth::routes(['verify' => true]);
Route::group(['prefix' => 'admin' , 'midddleware' => 'guest:admin'], function(){
	
	Route::get('login', 'LoginController@login')->name('admin.login');
	Route::post('login','LoginController@post_login')->name('admin.post.login'); 
	
});
