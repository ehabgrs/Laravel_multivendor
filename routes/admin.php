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
		
		Route::get('logout','AuthController@logout')->name('admin.logout');
		
		Route::group(['prefix' => 'settings'], function(){
			
			Route::get('shipping_methods/{method}', 'SettingsController@edit_shipping_methods')->name('edit.shipping.methods');
			Route::put('shipping_methods/{id}', 'SettingsController@update_shipping_methods')->name('update.shipping.methods');
			
		});
		
		Route::group(['prefix' => 'profile'], function(){
			
			Route::get('edit', 'ProfileController@edit')->name('profile.edit');
			Route::put('update', 'ProfileController@update')->name('profile.update');
			Route::get('edit_password', 'ProfileController@edit_password')->name('profile.password.edit');
			Route::put('update_password', 'ProfileController@update_password')->name('profile.password.update');
			
		});
		
		
	});
	
	
	
	//TODOLIST FIX LOGIN REDIRECT IF AUTHENTICATED Auth::routes(['verify' => true]);
	Route::group(['prefix' => 'admin' , 'midddleware' => 'guest:admin'], function(){
	
	Route::get('login', 'AuthController@login')->name('admin.login');
	Route::post('login','AuthController@post_login')->name('admin.post.login'); 
	
	});


});




