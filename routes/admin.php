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

	######################### Start of admin authenticated Routes ############################
	Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function(){
		
		Route::get('/' , 'DashboardController@index')->name('admin');
		Route::get('logout','AuthController@logout')->name('admin.logout');
		
		
		
		########################### Start of settings routes ############################
		Route::group(['prefix' => 'settings'], function(){
			
			Route::get('shipping_methods/{method}', 'SettingsController@edit_shipping_methods')->name('edit.shipping.methods');
			Route::put('shipping_methods/{id}', 'SettingsController@update_shipping_methods')->name('update.shipping.methods');
			
		});########################End of settings routes #################################
		
		
		
		########################### Start of profile routes ############################
		Route::group(['prefix' => 'profile'], function(){
			
			Route::get('edit', 'ProfileController@edit')->name('profile.edit');
			Route::put('update', 'ProfileController@update')->name('profile.update');
			Route::get('edit_password', 'ProfileController@edit_password')->name('profile.password.edit');
			Route::put('update_password', 'ProfileController@update_password')->name('profile.password.update');	
			
		});########################End of profile routes #################################
		
		
		
		//another way to write the group
		//also to add for the name
		Route::name('admin.')->group(function(){
			
			########################start of categories routes #################################
			Route::resource('categories', CategoriesController::class);
			Route::get('subcategories','CategoriesController@subcategories_index')->name('categories.subcategories_index');
			########################End of categories routes #################################
			
			
			Route::resources([
			'brands'	=> BrandsController::class,
			'tags'		=> TagsController::class,
			'products'  => ProductController::class,
			'attributes'=> AttributeController::class,
			//'attributes_values' => AttributesValuesController::class,
			]);
			
			
			//////////extra routes for productes
			Route::get('products/edit_price/{id}','ProductController@edit_price')->name('products.edit_price');
			Route::put('products/update_price/{id}','ProductController@update_price')->name('products.update_price');
			
			#Add multiphotos by dropzone
			Route::get('products/add_photos/{id}','ProductController@add_photos')->name('products.add.photos');
			
			Route::post('products/receive_dropzone_photos','ProductController@receive_dropzone_photos')->name('products.receive_dropzone.photos');
			Route::post('products/remove_dropzone_photo','ProductController@remove_dropzone_photo')->name('products.remove_dropzone.photo');
			
			Route::post('products/store_photos/{id}','ProductController@store_photos')->name('products.store.photos');
			//////////end productes
			
		});
		


	});######################### End of admin authenticated Routes ############################
	
	
	
	
	######################## Start of guest routes #################################
	//TODOLIST FIX LOGIN REDIRECT IF AUTHENTICATED Auth::routes(['verify' => true]);
	Route::group(['prefix' => 'admin' , 'midddleware' => 'guest:admin'], function(){
	
		Route::get('login', 'AuthController@login')->name('admin.login');
		Route::post('login','AuthController@post_login')->name('admin.post.login'); 
	
	});######################## End of guest routes #################################


});




