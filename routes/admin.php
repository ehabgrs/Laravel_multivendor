<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

//I added namespace for this file at RouteServiceProvider file is App\Http\Controllers\Admin

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 


	Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function(){
		
		Route::get('/' , 'DashboardController@index')->name('admin');
		
		Route::group(['prefix' => 'settings'], function(){
			Route::get('shipping_methods/{method}', 'SettingsController@edit_shipping_methods')->name('edit.shipping.methods');
			Route::put('shipping_methods/{id}', 'SettingsController@update_shipping_methods')->name('update.shipping.methods');
		});
		
		
	});
	
	
	
	//TODOLIST FIX LOGIN REDIRECT IF AUTHENTICATED Auth::routes(['verify' => true]);
	Route::group(['prefix' => 'admin' , 'midddleware' => 'guest:admin'], function(){
	
	Route::get('login', 'LoginController@login')->name('admin.login');
	Route::post('login','LoginController@post_login')->name('admin.post.login'); 
	
	});


});




